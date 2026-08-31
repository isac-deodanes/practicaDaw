<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_and_redirect_to_inicio(): void
    {
        User::factory()->create([
            'email' => 'empleado@test.com',
            'password' => Hash::make('password123'),
            'rol' => 'empleado',
        ]);

        $response = $this->from('/')->post('/login', [
            'email' => 'empleado@test.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/inicio');
        $this->assertAuthenticated();
    }
}
