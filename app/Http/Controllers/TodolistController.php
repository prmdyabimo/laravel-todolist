<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodolistController extends Controller
{
    private TodolistService $todolistService;

    public function __construct(TodolistService $todolistService)
    {
        $this->todolistService = $todolistService;
    }

    public function todoList(Request $request): Response
    {
        $todolist = $this->todolistService->getTodolist();

        return response()->view('todolist.todolist', [
            'title' => 'Todolist | Laravel Todolist',
            'todolist' => $todolist
        ]);
    }

    public function saveTodo(Request $request)
    {

    }

    public function removoTodo(Request $request, string $todoId)
    {

    }
}
