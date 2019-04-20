<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use phpDocumentor\Reflection\Types\Void_;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /**
     * @test
     */

     public function Login()
     {
         $response = $this->json('POST', route('login'), [
             'name' => $this->user->name,
             'password' => 'password',
         ]);

         $response->assertStatus(200);

         $this->assertAuthenticatedAs($this->user);
     }
}
