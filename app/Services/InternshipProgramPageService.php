<?php

namespace App\Services;

use App\Repositories\Contracts\InternshipProgramPageRepositoryInterface;
use App\Services\Contracts\InternshipProgramPageServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class InternshipProgramPageService extends BaseCrudService implements InternshipProgramPageServiceInterface
{
    use FileManagable;

    private const FOLDER = 'internshipProgramPage';

    public function __construct(
        InternshipProgramPageRepositoryInterface $repository,
        )
    {
        parent::__construct($repository);
    }

    public function create(array $payload, ?UploadedFile $file = null): Model
    {
        if (!is_null($file) && isset($payload['image'])) {
            $image = $this->upload(self::FOLDER, $file);
            $payload['image'] = $image;
        }
        return parent::create($payload);
    }

    public function delete(Model|int $modelOrModelId): bool
    {
        $this->deleteFile(self::FOLDER, $modelOrModelId->getAttribute('image'));

        return parent::delete($modelOrModelId);
    }

    public function search(string $keyword, array|string $columns = '*'): Collection
    {
        return $this->repository->search($keyword, $columns);
    }


    public function update(Model|int $modelOrModelId, array $payload, ?UploadedFile $file = null): Model
    {

        if (!is_null($file) && isset($payload['image'])) {
            $payload['image'] = $this->removeOldUploadNewFile(
                self::FOLDER,
                $file,
                $modelOrModelId->getAttribute('image')
            );
        }

        return parent::update($modelOrModelId, $payload);
    }
}
