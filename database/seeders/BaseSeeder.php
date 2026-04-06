<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Traits\FileManagable;
use Crud\Repositories\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

abstract class BaseSeeder extends Seeder
{
    use FileManagable;

    private string $file;

    private array $payload = [];

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function setPayload(string $file): void
    {
        $this->file = $file;
        $this->payload = require_once __DIR__ . "/data/$file.php";
    }

    protected function create(EloquentRepositoryInterface $repository): void
    {
        collect($this->getPayload())->each(
            fn(array $item): Model => $repository->create($item)
        );
    }

    protected function createWithCopyingImage(EloquentRepositoryInterface $repository, string $itemKey = 'image'): void
    {
        collect($this->getPayload())->each(
            function (array $item) use ($itemKey, $repository): Model {
                if (is_file($sourcePath = public_path() . $item[$itemKey])) {
                    $item[$itemKey] = $this->copyFile($sourcePath, $this->file);
                }
                return $repository->create($item);
            }
        );
    }
}
