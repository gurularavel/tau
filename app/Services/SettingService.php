<?php

namespace App\Services;

use App\Enums\SettingType;
use App\Repositories\Contracts\SettingRepositoryInterface;
use App\Services\Contracts\SettingServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class SettingService extends BaseCrudService implements SettingServiceInterface
{
    use FileManagable;

    private const FOLDER = 'settings';

    public function __construct(SettingRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function update(Model|int $modelOrModelId, array $payload): Model
    {
        if ($payload['type'] == SettingType::FILE?->value && !empty($payload['file'])) {
            $payload['value'] = $this->removeOldUploadNewFile(
                self::FOLDER,
                $payload['file'],
                $modelOrModelId->getAttribute('value')
            );
        } else if ($modelOrModelId->getAttribute('type') === SettingType::FILE?->value) {
            $this->deleteFile('settings', $modelOrModelId->getAttribute('value'));
        }

        return parent::update($modelOrModelId, $payload);
    }
}
