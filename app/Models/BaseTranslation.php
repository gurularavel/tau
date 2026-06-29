<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Bütün tərcümə (translation) modelləri üçün baza.
 *
 * Stored XSS müdafiəsi (XDMX audit #4, CVSS 5.1) — INPUT VALIDATION:
 * Rich-text sahələri (editordan gələn HTML) verilənlər bazasına yazılmazdan ƏVVƏL
 * server tərəfində sanitizasiya olunur (`clean_html`). Beləliklə DB-də heç vaxt
 * icra olunan zərərli kod (on*=, <script>, javascript: ...) saxlanılmır.
 *
 * Bu, output-dakı `{!! clean_html(...) !!}` müdafiəsini TAMAMLAYIR (defense-in-depth):
 *  - Input (bura): DB təmiz qalır, hansı render yolu olursa-olsun.
 *  - Output (blade sink-ləri): köhnə/miras məlumat üçün.
 */
class BaseTranslation extends Model
{
    public $timestamps = false;

    /**
     * Yazılarkən HTML sanitizasiyasından keçən rich-text sahələri.
     * (title, name, email, phone, meta_* — düz mətndir, output-da {{ }} ilə escape olunur.)
     *
     * @var array<int,string>
     */
    protected array $htmlSanitizedAttributes = ['description', 'content'];

    /**
     * Rich-text sahələrini təyin edilərkən təhlükəsiz HTML-ə çevirir.
     */
    public function setAttribute($key, $value)
    {
        if (is_string($value)
            && in_array($key, $this->htmlSanitizedAttributes, true)
            && function_exists('clean_html')) {
            $value = clean_html($value);
        }

        return parent::setAttribute($key, $value);
    }
}
