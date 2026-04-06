<?php

namespace App\Services;

use App\Repositories\Contracts\ContactPageRepositoryInterface;
use App\Services\Contracts\ContactPageServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class ContactPageService extends BaseCrudService implements ContactPageServiceInterface
{
    use FileManagable;

    private const FOLDER = 'contact';

    public function __construct(
        ContactPageRepositoryInterface $repository,
        )

    {
        parent::__construct($repository);
    }

    public function update(Model|int $modelOrModelId, array $payload, ?UploadedFile $file = null): Model
    {

        return parent::update($modelOrModelId, $payload);
    }
}
