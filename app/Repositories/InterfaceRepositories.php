<?php

namespace App\Repositories;

interface InterfaceRepositories
{
    public function all();
    public function find($id);
    public function where($column, $value);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
