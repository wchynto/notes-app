<?php

namespace App\Services;

use App\DTO\ListDTO;
use App\Repositories\ListRepository;
use App\Repositories\TodoRepository;

class ListService
{
    protected $listRepository;
    protected $todoRepository;

    public function __construct(ListRepository $listRepository, TodoRepository $todoRepository)
    {
        $this->listRepository = $listRepository;
        $this->todoRepository = $todoRepository;
    }

    public function all()
    {
        return $this->listRepository->all();
    }

    public function find($id)
    {
        return $this->listRepository->find($id);
    }

    public function create(ListDTO $dto)
    {
        $list = $dto->toArray();
        $todos = $list['todos'];

        unset($list['todos']);

        $list['user_ulid'] = auth()->user()->ulid;

        $createdList = $this->listRepository->create($list);

        foreach ($todos as $todo) {
            $todo['list_ulid'] = $createdList->ulid;
            $this->todoRepository->create($todo);
        }

        return $createdList;
    }

    public function update(ListDTO $dto, $id)
    {
        $list = $dto->toArray();
        $todos = $list['todos'];
        $deleteTodos = $list['deleteTodos'];

        unset($list['todos']);

        $updatedList = $this->listRepository->update($list, $id);

        foreach ($todos as $todo) {
            if (isset($todo['ulid'])) {
                $this->todoRepository->update($todo, $todo['ulid']);
                continue;
            }

            $todo['list_ulid'] = $updatedList->ulid;
            $this->todoRepository->create($todo);
        }

        if (isset($deleteTodos)) {
            foreach ($deleteTodos as $todo) {
                $this->todoRepository->delete($todo['ulid']);
            }
        }

        return $updatedList;
    }

    public function delete($id)
    {
        return $this->listRepository->delete($id);
    }
}
