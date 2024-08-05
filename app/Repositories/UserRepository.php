<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements InterfaceRepositories
{
    public function all()
    {
        return User::without(['notes', 'lists'])->get();
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function where($column, $value)
    {
        return User::where($column, $value)->get();
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(array $data, $id)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
}
