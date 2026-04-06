<?php

namespace App\Enums;

enum PageBlockType: string
{
    // Əsas bloklar
    case TITLE_SUBTITLE = 'title_subtitle';        // Başlıq + Alt başlıq + Şəkil
    case BLOCKS_SECTION = 'blocks_section';        // Çoxlu kiçik bloklar (şəkil + title + content)
    case LONG_BLOCK = 'long_block';                // Uzun blok (böyük şəkil + title + content)

    /**
     * Blok adı
     */
    public function label(): string
    {
        return match($this) {
            self::TITLE_SUBTITLE => 'Başlıq + Alt başlıq',
            self::BLOCKS_SECTION => 'Bloklar (kartlar)',
            self::LONG_BLOCK => 'Uzun Blok',
        };
    }

    /**
     * Blok ikonu (Remix Icons)
     */
    public function icon(): string
    {
        return match($this) {
            self::TITLE_SUBTITLE => 'ri-heading',
            self::BLOCKS_SECTION => 'ri-layout-grid-line',
            self::LONG_BLOCK => 'ri-article-line',
        };
    }

    /**
     * Blok kateqoriyası
     */
    public function category(): string
    {
        return match($this) {
            self::TITLE_SUBTITLE => 'Başlıq',
            self::BLOCKS_SECTION => 'Bölmələr',
            self::LONG_BLOCK => 'Məzmun',
        };
    }

    /**
     * Default settings hər blok üçün
     */
    public function defaultSettings(): array
    {
        return match($this) {
            self::TITLE_SUBTITLE => [
                'alignment' => 'center',
                'has_image' => true,
                'image_position' => 'top', // top, bottom, background
            ],
            self::BLOCKS_SECTION => [
                'columns' => 3, // 2, 3, 4
                'layout' => 'grid', // grid, list
            ],
            self::LONG_BLOCK => [
                'image_position' => 'left', // left, right, top
                'image_width' => '50%',
            ],
        };
    }

    /**
     * Blok üçün lazım olan sahələr
     */
    public function requiredFields(): array
    {
        return match($this) {
            self::TITLE_SUBTITLE => ['title'],
            self::BLOCKS_SECTION => ['data'], // array of blocks
            self::LONG_BLOCK => ['title', 'content'],
        };
    }

    /**
     * Blok strukturu təsviri
     */
    public function description(): string
    {
        return match($this) {
            self::TITLE_SUBTITLE => 'Səhifə başlığı və alt başlığı. İsteğe bağlı şəkil əlavə edə bilərsiniz.',
            self::BLOCKS_SECTION => 'Çoxlu kiçik kartlar. Hər kartda şəkil, başlıq və məzmun var.',
            self::LONG_BLOCK => 'Geniş məzmun bloku. Şəkil və mətn birlikdə göstərilir.',
        };
    }

    /**
     * Bütün blokları kateqoriya üzrə qruplaşdır
     */
public static function groupedByCategory(): array
{
    $grouped = [];
    foreach (self::cases() as $type) {
        // Massiv yaratmaq əvəzinə, birbaşa Enum obyektini (case) massivə əlavə edirik
        $grouped[$type->category()][] = $type;
    }
    return $grouped;
}
}
