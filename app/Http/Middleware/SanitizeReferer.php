<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Open Redirect müdafiəsi.
 *
 * Laravel-də `redirect()->back()` öncə `Referer` başlığına güvənir. Hücumçu bu
 * başlığı xarici domenə (məs. http://evil.com) yönəltsə, istifadəçi zərərli sayta
 * yönləndirilə bilər (Open Redirect — XDMX audit, CVSS 6.1).
 *
 * Bu middleware Referer başlığını yoxlayır: əgər host saytın öz hostundan fərqlidirsə,
 * başlıq silinir. Bu zaman `back()` təhlükəsiz şəkildə sessiyadakı əvvəlki (eyni-origin)
 * URL-ə geri qayıdır.
 */
class SanitizeReferer
{
    public function handle(Request $request, Closure $next): Response
    {
        $referer = $request->headers->get('referer');

        if ($referer) {
            $refererHost = parse_url($referer, PHP_URL_HOST);

            // Host parse oluna bilmirsə və ya saytın hostundan fərqlidirsə — başlığı sil.
            if ($refererHost === null || $refererHost === false || $refererHost !== $request->getHost()) {
                $request->headers->remove('referer');
            }
        }

        return $next($request);
    }
}
