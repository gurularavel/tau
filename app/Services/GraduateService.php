<?php

namespace App\Services;

use App\Repositories\Contracts\GraduateRepositoryInterface;
use App\Services\Contracts\GraduateServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class GraduateService extends BaseCrudService implements GraduateServiceInterface
{
    use FileManagable;

    private const FOLDER = 'graduates';

    public function __construct(
        GraduateRepositoryInterface $repository,
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
                        if (isset($payload['images'])) {
            $images = $this->multiUpload('graduate_images', $payload['images']);
            $images = create_many('image', $images);
            $payload['images'] = $images;
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
                if (isset($payload['images'])) {
            $images = $this->multiUpload('graduate_images', $payload['images']);
            $images = create_many('image', $images);
            $payload['images'] = $images;
        }



        return parent::update($modelOrModelId, $payload);
    }
    public function viewCount(Model $model): void
    {
        $this->repository->viewCount($model);
    }
}
