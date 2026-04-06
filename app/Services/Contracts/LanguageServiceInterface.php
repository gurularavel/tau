<?php

namespace App\Services\Contracts;

use Crud\Services\Contracts\BaseCrudServiceInterface;

interface LanguageServiceInterface extends BaseCrudServiceInterface
{
    public function disableMainLanguage(): void;
}
