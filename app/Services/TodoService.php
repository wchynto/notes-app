<?php

namespace App\Services;

use App\DTO\TodoDTO;
use App\Repositories\TodoRepository;

class TodoService
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function all()
    {
        return $this->todoRepository->all();
    }

    public function find($id)
    {
        return $this->todoRepository->find($id);
    }

    public function create(TodoDTO $dto)
    {
        return $this->todoRepository->create($dto->toArray());
    }

    public function update(TodoDTO $dto, $id)
    {
        return $this->todoRepository->update($dto->toArray(), $id);
    }

    public function delete($id)
    {
        return $this->todoRepository->delete($id);
    }
}
