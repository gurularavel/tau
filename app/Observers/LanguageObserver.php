<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Language;
use App\Services\Contracts\LanguageServiceInterface;
use App\Services\Custom\ConfigReader;
use Exception;

class LanguageObserver
{
    public function __construct(private readonly LanguageServiceInterface $languageService)
    {
    }

    /**
     * @return void
     * @throws Exception
     */
    public function saved(): void
    {
        (new ConfigReader($this->languageService))->findAndReplace();
    }
}
