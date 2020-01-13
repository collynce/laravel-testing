<?php

namespace Tests\Unit;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class testUserLoginRegister extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testExample()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertViewIs('home');
    }

    public function test_user_login()
    {
        $user = factory(User::class)->create();
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('posts'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_registration()
    {
        $name = $this->faker->name;
        $email = $this->faker->safeEmail;
        $password = $this->faker->password(6);

        $response = $this->post('register', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect(route('posts'));
        $user = User::where('email', $email)->where('name', $name)->first();
        $this->assertNotNull($user);

        $this->assertAuthenticatedAs($user);
    }

}
