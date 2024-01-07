<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testTodolist(): void
    {
        $this->withSession([
            'username' => 'pramudya',
            'todolist' => [
                [
                    'id' => '1',
                    'todo' => 'Bimo'
                ]
            ]
        ])->get('/todolist')
            ->assertSeeText('1')
            ->assertSeeText('Bimo');
    }

    public function testSaveTodoFailed(): void
    {
        $this->withSession([
            'username' => 'pramudya'
        ])->post('/todolist', [])
            ->assertSeeText('Todo is required');
    }

    public function testSaveTodoSuccess(): void
    {
        $this->withSession([
            'username' => 'pramudya'
        ])->post('/todolist', [
                    'todo' => 'Bimo'
                ])->assertRedirect('/todolist');
    }
}
