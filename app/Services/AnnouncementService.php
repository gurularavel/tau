<?php

namespace App\Services;

use App\Repositories\Contracts\AnnouncementRepositoryInterface;
use App\Services\Contracts\AnnouncementServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class AnnouncementService extends BaseCrudService implements AnnouncementServiceInterface
{
    use FileManagable;

    private const FOLDER = 'announcements';

    public function __construct(
        AnnouncementRepositoryInterface           $repository,
        private readonly AnnouncementImageService $announcementImageService
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
            $images = $this->multiUpload('announcements_images', $payload['images']);
            $images = create_many('image', $images);
            $payload['images'] = $images;
        }

        return parent::create($payload);
    }

    public function delete(Model|int $modelOrModelId): bool
    {
        $this->deleteFile(self::FOLDER, $modelOrModelId->image);

        if ($modelOrModelId->images !== null) {

            foreach ($modelOrModelId->images as $announcementImage) {
                $this->announcementImageService->delete($announcementImage);
            }
        }

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
        if (isset($payload['delete_images'])) {
            foreach ($modelOrModelId->images->whereIn('id', $payload['delete_images']) as $announcementImage) {
                $this->announcementImageService->delete($announcementImage);
            }
        }

        if (!is_null($file) && isset($payload['image'])) {
            $payload['image'] = $this->removeOldUploadNewFile(
                self::FOLDER,
                $file,
                $modelOrModelId->getAttribute('image')
            );
        }

        if (isset($payload['images'])) {
            $images = $this->multiUpload('announcements_images', $payload['images']);
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
