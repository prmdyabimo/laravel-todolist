<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testLoginSuccess(): void
    {
        self::assertTrue($this->userService->login('pramudya', 'rahasia'));
    }

    public function testLoginUserNotFound(): void
    {
        self::assertFalse($this->userService->login('bimo', 'bimo'));
    }

    public function testLoginWrongPassword(): void
    {
        self::assertFalse($this->userService->login('pramudya', 'salah'));
    }
}
