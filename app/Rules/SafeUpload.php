<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

/**
 * Yüklənən faylın kontentini zərərli skript nümunələri üçün yoxlayır.
 *
 * XDMX audit tapıntıları:
 *  - SVG içində JavaScript → XSS (CVSS 8.2)
 *  - PDF içində JavaScript → Portable Data Exfiltration (CVSS 2.0)
 *
 * Extension whitelist-dən əlavə, defense-in-depth olaraq fayl məzmununu yoxlayır:
 * <script>, javascript:, on*=, PDF /JS, /JavaScript, /OpenAction, /AA və s.
 */
class SafeUpload implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$value instanceof UploadedFile || !$value->isValid()) {
            return;
        }

        $ext = strtolower($value->getClientOriginalExtension());

        // SVG ümumiyyətlə qadağandır.
        if ($ext === 'svg') {
            $fail('SVG faylları təhlükəsizlik səbəbilə qəbul edilmir.');
            return;
        }

        $path = $value->getRealPath();
        if (!$path || !is_readable($path)) {
            return;
        }

        // Faylın ilk hissəsini oxumaq kifayətdir (performans üçün məhdudlaşdırılır).
        $content = @file_get_contents($path, false, null, 0, 2 * 1024 * 1024); // 2 MB
        if ($content === false) {
            return;
        }

        $needles = [
            '<script',
            'javascript:',
            'onerror=',
            'onload=',
            'onclick=',
            'onmouseover=',
            '/JavaScript',
            '/JS',
            '/OpenAction',
            '/AA',
            '/Launch',
            '/EmbeddedFile',
        ];

        $haystack = $content;
        foreach ($needles as $needle) {
            if (stripos($haystack, $needle) !== false) {
                $fail('Faylın içində icazə verilməyən skript/aktiv kod aşkar edildi.');
                return;
            }
        }
    }
}
