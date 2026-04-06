<?php

namespace App\Services;

use App\Repositories\Contracts\CareerOpportunityPageRepositoryInterface;
use App\Services\Contracts\CareerOpportunityPageServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class CareerOpportunityPageService extends BaseCrudService implements CareerOpportunityPageServiceInterface
{
    use FileManagable;

    private const FOLDER = 'careerOpportunityPage';

    public function __construct(
        CareerOpportunityPageRepositoryInterface $repository,
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
