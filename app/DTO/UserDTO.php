<?php

namespace App\DTO;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;

class UserDTO
{
    public $name;
    public $email;
    public $password;
    public $remember;

    public function __construct($name, $email, $password, $remember)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->remember = $remember;
    }

    public static function registerRequest(RegisterUserRequest $request): self
    {
        return new self(
            $request->name,
            $request->email,
            $request->password,
            $request->remember
        );
    }

    public static function loginRequest(LoginUserRequest $request): self
    {
        return new self(
            NULL,
            $request->email,
            $request->password,
            $request->remember
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'remember' => $this->remember,
        ];
    }
}
