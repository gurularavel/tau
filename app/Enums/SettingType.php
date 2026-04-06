<?php

declare(strict_types=1);

namespace App\Enums;

enum SettingType: string
{
    case FILE = 'file_type';
    case TEXT = 'text_type';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
