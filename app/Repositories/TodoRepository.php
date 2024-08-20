<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository implements InterfaceRepositories
{
    public function all()
    {
        return Todo::with('lists')->get();
    }

    public function find($id)
    {
        return Todo::with('lists')->findOrFail($id);
    }

    public function where($column, $value)
    {
        return Todo::with('lists')->where($column, $value)->get();
    }

    public function create(array $data)
    {
        return Todo::create($data);
    }

    public function update(array $data, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update($data);
        return $todo;
    }

    public function delete($id)
    {
        return Todo::findOrFail($id)->delete();
    }
}
