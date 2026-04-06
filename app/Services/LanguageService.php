<?php

namespace App\Services;

use App\Repositories\Contracts\LanguageRepositoryInterface;
use App\Services\Contracts\LanguageServiceInterface;
use Crud\Services\BaseCrudService;

class LanguageService extends BaseCrudService implements LanguageServiceInterface
{
    public function __construct(LanguageRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function disableMainLanguage(): void
    {
        $this->repository->disableMainLanguage();
    }
}
