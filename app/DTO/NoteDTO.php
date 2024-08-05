<?php

namespace App\DTO;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;

class NoteDTO
{
    public $title;
    public $content;

    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public static function storeRequest(StoreNoteRequest $request): self
    {
        return new self(
            $request->title,
            $request->content
        );
    }

    public static function updateRequest(UpdateNoteRequest $request): self
    {
        return new self(
            $request->title,
            $request->content
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content
        ];
    }
}
