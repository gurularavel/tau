<?php

declare(strict_types=1);

namespace App\Enums;

enum GalleryItemType: string
{
    case IMAGES = 'images';
    case VIDEOS = 'videos';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
