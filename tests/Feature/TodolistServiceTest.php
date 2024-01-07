<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
    private TodolistService $todolistService;

    public function setUp(): void
    {
        parent::setUp();

        $this->todolistService = $this->app->make(TodolistService::class);
    }

    /**
     * A basic feature test example.
     */
    public function testTodolistNotNull(): void
    {
        self::assertNotNull($this->todolistService);
    }

    public function testSaveTodo(): void
    {
        $this->todolistService->saveTodo("1", "Bimo");

        $todolist = Session::get('todolist');

        foreach ($todolist as $value) {
            self::assertEquals('1', $value['id']);
            self::assertEquals('Bimo', $value['todo']);
        }
    }
}
