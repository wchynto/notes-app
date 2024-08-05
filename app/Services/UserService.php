<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function create(UserDTO $dto)
    {

        return $this->userRepository->create($dto->toArray());
    }

    public function update(UserDTO $dto, $id)
    {
        return $this->userRepository->update($dto->toArray(), $id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

    public function login(UserDTO $dto)
    {
        $userDto = $dto->toArray();
        unset($userDto['name']);
        unset($userDto['remember']);

        if (auth()->attempt($userDto, $dto->remember)) {
            return true;
        }

        return false;
    }

    public function logout()
    {
        return auth()->logout();
    }
}
