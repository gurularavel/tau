<?php

namespace Crud\Services\Contracts;

use Crud\Requests\RequestParser;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Expression;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface BaseCrudServiceInterface
{
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
    ): int;

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
    ): Collection;

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
        ?int          $perPage = null,
    ): LengthAwarePaginator;

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
    ): array;

    /**
     * create
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): Model;

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
    ): Model;

    /**
     * update
     *
     * @param int|Model $modelOrModelId
     * @param mixed $payload
     * @return Model
     */
    public function update(int|Model $modelOrModelId, array $payload): Model;

    /**
     * delete
     *
     * @param int|Model $modelOrModelId ,
     * @return bool
     */
    public function delete(int|Model $modelOrModelId): bool;
}
