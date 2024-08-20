<?php

namespace App\DTO;

class TodoDTO
{
    public $title;
    public $description;
    public $list_ulid;

    public function __construct($title, $description, $list_ulid)
    {
        $this->title = $title;
        $this->description = $description;
        $this->list_ulid = $list_ulid;
    }

    public static function storeRequest($request): self
    {
        return new self(
            $request->title,
            $request->description,
            $request->list_ulid
        );
    }

    public static function updateRequest($request): self
    {
        return new self(
            $request->title,
            $request->description,
            $request->list_ulid
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'list_ulid' => $this->list_ulid,
        ];
    }
}
