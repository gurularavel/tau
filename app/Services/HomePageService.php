<?php

namespace App\Services;

use App\Repositories\Contracts\HomePageRepositoryInterface;
use App\Services\Contracts\HomePageServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class HomePageService extends BaseCrudService implements HomePageServiceInterface
{
    use FileManagable;

    private const FOLDER = 'homePage';


    public function __construct(HomePageRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function create(array $payload, ?UploadedFile $file = null, ?uploadedfile $pdfFile = null): Model
    {

        if (!is_null($file) && isset($payload['image'])) {
            $image = $this->upload(self::FOLDER, $file);
            $payload['image'] = $image;
        }
        return parent::create($payload);
    }

    public function delete(Model|int $modelOrModelId): bool
    {
        $this->deleteFile(self::FOLDER,      $modelOrModelId->getAttribute('image'));

        return parent::delete($modelOrModelId);
    }

    public function search(string $keyword, array|string $columns = '*'): Collection
    {
        return $this->repository->search($keyword, $columns);
    }


    public function update(Model|int $modelOrModelId, array $payload, ?UploadedFile $file = null, ?UploadedFile $file2 = null, ?UploadedFile $file3 = null): Model
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


                if (!is_null($file3) && isset($payload['image3'])) {
            $payload['image3'] = $this->removeOldUploadNewFile(
                self::FOLDER,
                $file3,
                $modelOrModelId->getAttribute('image3')
            );
        }

        return parent::update($modelOrModelId, $payload);
    }
}
