<?php

namespace App\Services;

use App\Repositories\Contracts\HistoryPageRepositoryInterface;
use App\Services\Contracts\HistoryPageServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class HistoryPageService extends BaseCrudService implements HistoryPageServiceInterface
{
    use FileManagable;

    private const FOLDER = 'history_page';

    public function __construct(HistoryPageRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function update(
        Model|int $modelOrModelId,
        array $payload,
        ?UploadedFile $breadcrumb = null,
        ?UploadedFile $image1 = null,
        ?UploadedFile $image2 = null,
        ?UploadedFile $image3 = null,
        ?UploadedFile $image4 = null,
    ): Model {
        if ($breadcrumb) {
            $payload['breadcrumb'] = $this->removeOldUploadNewFile(
                self::FOLDER, $breadcrumb, $modelOrModelId->getAttribute('breadcrumb')
            );
        }
        foreach (['image1', 'image2', 'image3', 'image4'] as $i => $key) {
            $file = [$image1, $image2, $image3, $image4][$i];
            if ($file) {
                $payload[$key] = $this->removeOldUploadNewFile(
                    self::FOLDER, $file, $modelOrModelId->getAttribute($key)
                );
            }
        }

        return parent::update($modelOrModelId, $payload);
    }
}
