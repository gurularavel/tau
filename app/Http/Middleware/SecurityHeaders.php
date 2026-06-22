<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Təhlükəsizlik başlıqları (defense-in-depth).
 *
 * - X-Content-Type-Options: nosniff  → MIME sniffing (yüklənmiş SVG/PDF-də XSS) önlənir.
 * - X-Frame-Options: SAMEORIGIN       → clickjacking önlənir.
 * - Referrer-Policy                   → Referer sızması məhdudlaşdırılır.
 * - Content-Security-Policy           → inline/kənar zərərli skriptlərin icrasını
 *   məhdudlaşdırır (XSS müdafiəsi — XDMX audit tövsiyəsi).
 *
 * Qeyd: Sayt inline script/style və jsDelivr (Summernote) CDN-dən istifadə etdiyi üçün
 * CSP-də müvafiq mənbələrə icazə verilir. Sərtləşdirmə üçün gələcəkdə nonce-əsaslı
 * yanaşmaya keçmək olar.
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        if (!$response->headers->has('Content-Security-Policy')) {
            // Front (publik) səhifələr: nonce-əsaslı SƏRT CSP — 'unsafe-inline' yoxdur,
            // beləliklə editordan gələn stored XSS skriptləri icra OLUNMUR.
            // Admin paneli: çoxlu inline script/handler olduğu üçün relaxed siyasət saxlanılır.
            if ($request->routeIs('front.*')) {
                // Front tam self-hosted-dir (jQuery/Swiper/GLightbox lokal). Yalnız reCAPTCHA
                // üçün google qalır. CDN script mənbəyi yoxdur → daha sərt.
                $nonce = csp_nonce();
                $scriptSrc = "script-src 'self' 'nonce-{$nonce}' https://www.google.com https://www.gstatic.com";
                $styleSrc  = "style-src 'self' 'unsafe-inline'";
                $fontSrc   = "font-src 'self' data:";
            } else {
                // Admin: bütün JS/CSS kitabxanaları artıq self-hosted-dir.
                // Yalnız Summernote font picker üçün Google Fonts qalır (yalnız style/font).
                $scriptSrc = "script-src 'self' 'unsafe-inline' 'unsafe-eval'";
                $styleSrc  = "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com";
                $fontSrc   = "font-src 'self' data: https://fonts.gstatic.com";
            }

            $csp = implode('; ', [
                "default-src 'self'",
                $scriptSrc,
                $styleSrc,
                "img-src 'self' data: blob: https:",
                $fontSrc,
                "frame-src 'self' https://www.google.com https://www.youtube.com https://www.youtube-nocookie.com https://player.vimeo.com",
                "object-src 'none'",
                "base-uri 'self'",
                "frame-ancestors 'self'",
                "form-action 'self'",
            ]);
            $response->headers->set('Content-Security-Policy', $csp);
        }

        return $response;
    }
}
