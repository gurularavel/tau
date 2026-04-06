<?php

namespace App\Services;

use App\Models\BlockItem;
use App\Repositories\Contracts\BlockItemRepositoryInterface;
use App\Repositories\Contracts\BlockRepositoryInterface;
use App\Services\Contracts\BlockItemServiceInterface;
use App\Traits\FileManagable;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class BlockItemService extends BaseCrudService implements BlockItemServiceInterface
{
    use FileManagable;

    private const FOLDER = 'block_items';

    public function __construct(
        BlockItemRepositoryInterface           $repository,
    )
    {
        parent::__construct($repository);
    }
public function updateOrCreateWithTranslations($id, array $data, array $translations, $file = null, $container = false)
{
    $item = $id ? \App\Models\BlockItem::find($id) : new \App\Models\BlockItem();

    // ✅ Yalnız yeni fayl varsa şəkli dəyişirik
    if ($file && $file instanceof \Illuminate\Http\UploadedFile && $file->isValid()) {
        // Köhnə şəkili silirik
        if ($item->image && file_exists(public_path('uploads/block_items/' . $item->image))) {
            @unlink(public_path('uploads/block_items/' . $item->image));
        }

        // Yeni şəkili yükləyirik
        $fileName = time() . '_' . rand(111, 999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/block_items'), $fileName);
        $data['image'] = $fileName;
    } else {
        // ✅ Yeni fayl yoxdursa, image field-ini silməliyik ki bazadakı qalxsın
        unset($data['image']);
    }

    $item->fill($data);
    $item->save();

    // Tərcümələri yeniləyirik
    foreach ($translations as $locale => $translation) {
        $item->translations()->updateOrCreate(
            ['locale' => $locale],
            $translation
        );
    }

    return $item;
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
        $this->deleteFile(self::FOLDER, $modelOrModelId->image);


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


        if (!is_null($file) && isset($payload['image'])) {
            $payload['image'] = $this->removeOldUploadNewFile(
                self::FOLDER,
                $file,
                $modelOrModelId->getAttribute('image')
            );
        }



        return parent::update($modelOrModelId, $payload);
    }

    public function viewCount(Model $model): void
    {
        $this->repository->viewCount($model);
    }
}
