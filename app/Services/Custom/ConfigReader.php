<?php

declare(strict_types=1);

namespace App\Services\Custom;

use App\Services\Contracts\LanguageServiceInterface;
use Exception;
use Illuminate\Support\Facades\Artisan;

class ConfigReader
{
    private array $newLocales = [];

    private string $filename;

    /**
     * @throws Exception
     */
    public function __construct(private readonly LanguageServiceInterface $languageService)
    {
        $this->setFilename();
        $this->setNewLocales();
    }

    public function findAndReplace(): void
    {
        $fileContent = file_get_contents($this->filename);

        $pattern = "/'locales' => \[.*?\]/s";
        $replacement = "'locales' => " . json_encode(array_values($this->newLocales));;
        $fileContent = preg_replace($pattern, $replacement, $fileContent);

        file_put_contents($this->filename, $fileContent);

        Artisan::call('config:clear');
    }

    /**
     * @throws Exception
     */
    private function setFilename(): void
    {
        if (!file_exists($filename = config_path('translatable.php'))) {
            throw new Exception('File not found => config/translatable.php');
        }

        if (!is_array(config('translatable.locales'))) {
            throw new Exception('Value is not array => translatable.locales');
        }

        $this->filename = $filename;
    }

    private function getLocalesValue(array $locales): string
    {
        $locales = array_map(fn($value): string => "'{$value}'", $locales);

        return "'locales' => [" . implode(', ', $locales) . "],";
    }

    private function setNewLocales(): void
    {
        $newLocales = $this->languageService->pluck(
            column: 'locale',
            conditions: [['is_active', '=', 1]],
        );

        $this->newLocales = $newLocales;
    }
}
