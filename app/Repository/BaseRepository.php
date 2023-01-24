<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findOrFail($id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function createMany(array $data): bool
    {
        return $this->model->insert($data);
    }

    public function update(array $data, $id): bool
    {
        $record = $this->model->find($id);

        return $record->update($data);
    }

    public function delete($id): int
    {
        return $this->model->destroy($id);
    }
}
