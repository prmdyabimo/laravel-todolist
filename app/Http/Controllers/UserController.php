<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(): Response
    {
        return response()
            ->view('user.login', [
                'title' => 'Login | Laravel Todolist'
            ]);
    }

    public function doLogin(Request $request): Response|RedirectResponse
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // VALIDATE INPUT
        if (empty($username) || empty($password)) {
            return response()
                ->view('user.login', [
                    'title' => 'Login | Laravel Todolist',
                    'error' => 'Username or password is required'
                ]);
        }

        // VALIDATE USER
        if ($this->userService->login($username, $password)) {
            $request->session()->put("username", $username);
            return redirect('/');
        }

        return response()
            ->view('user.login', [
                'title' => 'Login | Laravel Todolist',
                'error' => 'Username or password is wrong'
            ]);
    }

    public function doLogout()
    {

    }
}
