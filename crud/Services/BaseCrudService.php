<?php

namespace Crud\Services;

use Crud\Requests\RequestParser;
use Crud\Services\Contracts\BaseCrudServiceInterface;
use Crud\Repositories\Contracts\EloquentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Expression;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

abstract class BaseCrudService implements BaseCrudServiceInterface
{

    /**
     * __construct
     *
     * @param EloquentRepositoryInterface $repository
     * @return void
     */
    public function __construct(protected readonly EloquentRepositoryInterface $repository)
    {
    }

    /**
     * @param string $column
     * @param array $conditions
     * @param array $params
     * @return int
     */
    public function count(
        string $column = 'id',
        array  $conditions = [],
        array  $params = [],
    ): int
    {
        return $this->repository->count($column, $conditions, $params);
    }

    /**
     * getAll
     *
     * @param array $columns
     * @param array $conditions
     * @param array $relations
     * @param array $params
     * @param string|null $sorting
     * @param int|null $limit
     * @param array $hasRelationConditions
     * @return Collection
     */
    public function getAll(
        array   $columns = ['*'],
        array   $conditions = [],
        array   $relations = [],
        array   $params = [],
        ?string $sorting = null,
        ?int    $limit = null,
        array $hasRelationConditions = [],
    ): Collection
    {
        return $this->repository->all(
            columns: $columns,
            conditions: $conditions,
            relations: $relations,
            params: $params,
            sorting: $sorting,
            limit: $limit,
            hasRelationConditions: $hasRelationConditions,
        );
    }

    /**
     * getAllPaginated
     *
     * @param RequestParser $requestParser
     * @param array $columns
     * @param array $conditions
     * @param array $relations
     * @param array $params
     * @param int|null $perPage
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(
        RequestParser $requestParser,
        array         $columns = ['*'],
        array         $conditions = [],
        array         $relations = [],
        array         $params = [],
        ?int    $perPage = null,
    ): LengthAwarePaginator
    {
        $options = $this->getQueryOptions($requestParser);

        $relations = array_merge($options['autoRelations'], $relations);

        $conditions = array_merge($options['conditions'], $conditions);

        return $this->repository->getAllPaginated(
            columns: $columns,
            conditions: $conditions,
            relations: $relations,
            params: $params,
            sorting: $options['sorting'],
            perPage: $perPage ?? $options['perPage'],
            customConditions: $options['customConditions'],
            customSorting: $options['customSorting'],
            customRelations: $options['customRelations'],
        );
    }

    /**
     * pluck
     *
     * @param string|\Illuminate\Database\Query\Expression $column
     * @param string|null $key
     * @param array $conditions
     *
     * @return array
     */
    public function pluck(
        string|Expression $column,
        string|null       $key = null,
        array             $conditions = []
    ): array
    {
        return $this->repository->pluck($column, $key, $conditions);
    }

    /**
     * create
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): Model
    {
        return $this->repository->create($payload);
    }

    /**
     * findById
     *
     * @param int|Model $modelOrModelId ,
     * @param RequestParser|null $requestParser
     * @param array|null $columns
     * @param array|null $relations
     * @param array|null $appends
     * @return Model
     */
    public function findById(
        int|Model      $modelOrModelId,
        ?RequestParser $requestParser = null,
        ?array         $columns = ['*'],
        ?array         $relations = [],
        ?array         $appends = []
    ): Model
    {
        if ($requestParser) {
            $options = $this->getQueryOptions($requestParser);

            $relations = array_merge($options['autoRelations'], $relations);
        }

        return $this->repository->findById(
            $modelOrModelId,
            $columns,
            $relations,
            $options['customRelations'] ?? [],
            $appends
        );
    }

    /**
     * update
     *
     * @param int|Model $modelOrModelId
     * @param mixed $payload
     * @return Model
     */
    public function update(
        int|Model     $modelOrModelId,
        array         $payload,
    ): Model
    {
        return $this->repository->update($modelOrModelId, $payload);
    }

    /**
     * delete
     *
     * @param int|Model $modelOrModelId
     * @return bool
     */
    public function delete(int|Model $modelOrModelId): bool
    {
        return $this->repository->deleteById($modelOrModelId);
    }

    /**
     * getQueryOptions
     *
     * @param RequestParser $requestParser
     * @return array
     */
    protected function getQueryOptions(RequestParser $requestParser): array
    {
        return [
            'conditions' => $requestParser->getAutoFilters(),
            'customConditions' => $requestParser->getCustomFilters(),
            'sorting' => $requestParser->getAutoSorting(),
            'customSorting' => $requestParser->getCustomSorting(),
            'autoRelations' => $requestParser->getExpandable(),
            'customRelations' => $requestParser->getCustomExpandable(),
            'perPage' => $requestParser->getPerPage(),
        ];
    }
}
