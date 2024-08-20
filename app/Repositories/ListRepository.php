<?php

namespace App\Repositories;

use App\Models\ListModel;

class ListRepository implements InterfaceRepositories
{
    public function all()
    {
        return ListModel::with('todos')->get();
    }

    public function find($id)
    {
        return ListModel::with('todos')->findOrFail($id);
    }

    public function where($column, $value)
    {
        return ListModel::with('todos')->where($column, $value)->get();
    }

    public function create(array $data)
    {
        return ListModel::create($data);
    }

    public function update(array $data, $id)
    {
        $note = ListModel::findOrFail($id);
        $note->update($data);
        return $note;
    }

    public function delete($id)
    {
        return ListModel::findOrFail($id)->delete();
    }
}
