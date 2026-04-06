<?php

namespace App\Services;

use App\Repositories\Contracts\DynamicImageRepositoryInterface;
use App\Services\Contracts\DynamicImageServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class DynamicImageService extends BaseCrudService implements DynamicImageServiceInterface
{
    use FileManagable;

    private const FOLDER = 'dynamic_images';

    public function __construct(DynamicImageRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function create(array $payload, ?UploadedFile $file = null): Model
    {
        if(!is_null($file) && isset($payload['image'])) {
            $image = $this->upload(self::FOLDER, $file);
            $payload['image'] = $image;
        }

        return parent::create($payload);
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

    public function delete(Model|int $modelOrModelId): bool
    {
        $this->deleteFile(self::FOLDER, $modelOrModelId->getAttribute('image'));

        return parent::delete($modelOrModelId);
    }
}
