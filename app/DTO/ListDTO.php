<?php

namespace App\DTO;

class ListDTO
{
    public $title;
    public $description;
    public $todos;
    public $deleteTodos;

    public function __construct($title, $description, $todos = [], $deleteTodos = [])
    {
        $this->title = $title;
        $this->description = $description;
        $this->todos = $todos;
        $this->deleteTodos = $deleteTodos;
    }

    public static function storeRequest($request): self
    {
        return new self(
            $request->title,
            $request->description,
            $request->todos,
            $request->deleteTodos
        );
    }

    public static function updateRequest($request): self
    {
        return new self(
            $request->title,
            $request->description,
            $request->todos,
            $request->deleteTodos
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'todos' => $this->todos,
            'deleteTodos' => $this->deleteTodos
        ];
    }
}
