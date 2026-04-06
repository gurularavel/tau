<?php

namespace App\Services;

use App\Models\DynamicItem;
use App\Repositories\Contracts\DynamicItemRepositoryInterface;
use App\Repositories\Contracts\DynamicRepositoryInterface;
use App\Services\Contracts\DynamicItemServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class DynamicItemService extends BaseCrudService implements DynamicItemServiceInterface
{
    use FileManagable;

    private const FOLDER = 'dynamic_items';

    public function __construct(
        DynamicItemRepositoryInterface           $repository,
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

    public function viewCount(Model $model): void
    {
        $this->repository->viewCount($model);
    }
}
