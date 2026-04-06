<?php

namespace App\Services;

use App\Repositories\Contracts\MediaGuidePageImageRepositoryInterface;
use App\Services\Contracts\MediaGuidePageImageServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class MediaGuidePageImageService extends BaseCrudService implements MediaGuidePageImageServiceInterface
{
    use FileManagable;

    private const FOLDER = 'media_guide_page_images';

    public function __construct(MediaGuidePageImageRepositoryInterface $repository)
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
            $images = $this->multiUpload('media_guide_page_images', $payload['images']);
            $images = create_many('image', $images);
            $payload['images'] = $images;
        }

        return parent::create($payload);
    }

    public function update(Model|int $modelOrModelId, array $payload, ?UploadedFile $file = null): Model
    {
        if (!is_null($file) && isset($payload['image'])) {
            $payload['image'] = $this->removeOldUploadNewFile(self::FOLDER, $file, $modelOrModelId->getAttribute('image'));
        }

        if (isset($payload['images'])) {
            $images = $this->multiUpload('media_guide_page_images', $payload['images']);
            $images = create_many('image', $images);
            $payload['images'] = $images;
        }

        return parent::update($modelOrModelId, $payload);
    }

    public function delete(Model|int $modelOrModelId): bool
    {
        $this->deleteFile(self::FOLDER, $modelOrModelId->getAttribute('image'));

        return parent::delete($modelOrModelId);
    }
}
