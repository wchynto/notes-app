<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserSessionController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function viewLogin()
    {
        return Inertia('Auth/Login');
    }

    public function viewRegister()
    {
        return Inertia('Auth/Register');
    }

    public function login(LoginUserRequest $request)
    {
        if ($this->userService->login(UserDTO::loginRequest($request))) {
            $request->session()->regenerate();

            return redirect()->route('notes.index');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function register(RegisterUserRequest $request)
    {
        $this->userService->create(UserDTO::registerRequest($request));
        return redirect()->route('viewRegister')->with('success', 'Berhasil mendaftar akun, silahkan masuk');
    }

    public function logout(Request $request)
    {
        $this->userService->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('viewLogin');
    }
}
