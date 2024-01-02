<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage(): void
    {
        $this->get('/login')
            ->assertSeeText('Login');
    }

    public function testLoginSuccess(): void
    {
        $this->post('/login', [
            'username' => 'pramudya',
            'password' => 'rahasia'
        ])->assertRedirect('/')
            ->assertSessionHas('username', 'pramudya');
    }

    public function testLoginValidationInput(): void
    {
        $this->post('/login', [])
            ->assertSeeText('Username or password is required');
    }

    public function testLoginFailed(): void
    {
        $this->post('/login', [
            'username' => 'salah',
            'password' => 'salah',
        ])->assertSeeText('Username or password is wrong');
    }

    public function testLogout(): void
    {
        $this->withSession([
            'username' => 'pramudya'
        ])->post('/logout')
            ->assertRedirect('/')
            ->assertSessionMissing('username');
    }
}
