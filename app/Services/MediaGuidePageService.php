<?php

namespace App\Services;

use App\Repositories\Contracts\MediaGuidePageRepositoryInterface;
use App\Services\Contracts\MediaGuidePageServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class MediaGuidePageService extends BaseCrudService implements MediaGuidePageServiceInterface
{
    use FileManagable;

    private const FOLDER = 'mediaGuidePage';

    public function __construct(MediaGuidePageRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function create(array $payload, ?UploadedFile $file = null, ?UploadedFile $file2 = null, ?UploadedFile $file3 = null): Model
    {
        if (!is_null($file) && isset($payload['image'])) {
            $image = $this->upload(self::FOLDER, $file);
            $payload['image'] = $image;
        }
        if (!is_null($file2) && isset($payload['image2'])) {
            $image2 = $this->upload(self::FOLDER, $file2);
            $payload['image2'] = $image2;
        }
        if (!is_null($file3) && isset($payload['image3'])) {
            $image3 = $this->upload(self::FOLDER, $file3);
            $payload['image3'] = $image3;
        }

        return parent::create($payload);
    }

    public function delete(Model|int $modelOrModelId): bool
    {
        $this->deleteFile(self::FOLDER, $modelOrModelId->getAttribute('image'));
        $this->deleteFile(self::FOLDER, $modelOrModelId->getAttribute('image2'));
        $this->deleteFile(self::FOLDER, $modelOrModelId->getAttribute('image3'));

        return parent::delete($modelOrModelId);
    }

    public function search(string $keyword, array|string $columns = '*'): Collection
    {
        return $this->repository->search($keyword, $columns);
    }

    public function update(Model|int $modelOrModelId, array $payload, ?UploadedFile $file = null, ?UploadedFile $file2 = null, ?UploadedFile $file3 = null): Model
    {
        if (!is_null($file) && isset($payload['image'])) {
            $payload['image'] = $this->removeOldUploadNewFile(self::FOLDER, $file, $modelOrModelId->getAttribute('image'));
        }
        if (!is_null($file2) && isset($payload['image2'])) {
            $payload['image2'] = $this->removeOldUploadNewFile(self::FOLDER, $file2, $modelOrModelId->getAttribute('image2'));
        }
        if (!is_null($file3) && isset($payload['image3'])) {
            $payload['image3'] = $this->removeOldUploadNewFile(self::FOLDER, $file3, $modelOrModelId->getAttribute('image3'));
        }

        if (isset($payload['images'])) {
            $images = $this->multiUpload('media_guide_page_images', $payload['images']);
            $images = create_many('image', $images);
            $payload['images'] = $images;
        }

        return parent::update($modelOrModelId, $payload);
    }
}
