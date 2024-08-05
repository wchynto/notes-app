<?php

namespace App\Services;

interface InterfaceService
{
    public function all();
    public function create($dataDTO);
    public function update($dataDTO, $id);
    public function delete($id);
}
