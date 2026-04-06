<?php

namespace App\Repositories\Contracts;

use Crud\Repositories\Contracts\EloquentRepositoryInterface;
interface LanguageRepositoryInterface extends EloquentRepositoryInterface
{
    public function disableMainLanguage(): void;
}
