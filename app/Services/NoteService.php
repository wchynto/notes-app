<?php

namespace App\Services;

use App\DTO\NoteDTO;
use App\Repositories\NoteRepository;

class NoteService
{
    protected $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function all()
    {
        return $this->noteRepository->all();
    }

    public function find($id)
    {
        return $this->noteRepository->find($id);
    }

    public function create(NoteDTO $dto)
    {
        return $this->noteRepository->create($dto->toArray());
    }

    public function update(NoteDTO $dto, $id)
    {
        return $this->noteRepository->update($dto->toArray(), $id);
    }

    public function delete($id)
    {
        return $this->noteRepository->delete($id);
    }
}
