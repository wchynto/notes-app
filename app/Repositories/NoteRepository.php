<?php

namespace App\Repositories;

use App\Models\Note;

class NoteRepository implements InterfaceRepositories
{
    public function all()
    {
        return Note::all();
    }

    public function find($id)
    {
        return Note::findOrFail($id);
    }

    public function where($column, $value)
    {
        return Note::where($column, $value)->get();
    }

    public function create(array $data)
    {
        return Note::create($data);
    }

    public function update(array $data, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($data);
        return $note;
    }

    public function delete($id)
    {
        return Note::findOrFail($id)->delete();
    }
}
