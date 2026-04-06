<?php

namespace App\Services;

use App\Repositories\Contracts\ProgramRepositoryInterface;
use App\Services\Contracts\ProgramServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class ProgramService extends BaseCrudService implements ProgramServiceInterface
{
    use FileManagable;

    private const FOLDER = 'programs';

    public function __construct(
        ProgramRepositoryInterface           $repository,
    )
    {
        parent::__construct($repository);
    }

    public function create(array $payload, ?UploadedFile $file = null,?UploadedFile $file2 = null): Model
    {
        if (!is_null($file) && isset($payload['image'])) {
            $image = $this->upload(self::FOLDER, $file);
            $payload['image'] = $image;
        }
               if (!is_null($file2) && isset($payload['image2'])) {
            $image2 = $this->upload(self::FOLDER, $file2);
            $payload['image2'] = $image2;
        }


        return parent::create($payload);
    }

    public function delete(Model|int $modelOrModelId): bool
    {
        $this->deleteFile(self::FOLDER, $modelOrModelId->image);


        return parent::delete($modelOrModelId);
    }

    public function latest(array|string $columns = '*', ?string $latestColumn = null, array $conditions = []): Model|null
    {
        return $this->repository->latest($columns, $latestColumn, $conditions);
    }

    public function next(Model $model, array|string $columns = '*'): Model|null
    {
        return $this->repository->next($model, $columns);
    }

    public function previous(Model $model, array|string $columns = '*'): Model|null
    {
        return $this->repository->previous($model, $columns);
    }

    public function related(Model $model, array|string $columns = '*'): Collection
    {
        return $this->repository->related($model, $columns);
    }

    public function search(string $keyword, array|string $columns = '*'): Collection
    {
        return $this->repository->search($keyword, $columns);
    }

    public function update(Model|int $modelOrModelId, array $payload, ?UploadedFile $file = null,  ?UploadedFile $file2 = null): Model
    {


        if (!is_null($file) && isset($payload['image'])) {
            $payload['image'] = $this->removeOldUploadNewFile(
                self::FOLDER,
                $file,
                $modelOrModelId->getAttribute('image')
            );
        }
        if (!is_null($file2) && isset($payload['image2'])) {
            $payload['image2'] = $this->removeOldUploadNewFile(
                self::FOLDER,
                $file2,
                $modelOrModelId->getAttribute('image2')
            );
        }


        return parent::update($modelOrModelId, $payload);
    }

    public function viewCount(Model $model): void
    {
        $this->repository->viewCount($model);
    }
}
