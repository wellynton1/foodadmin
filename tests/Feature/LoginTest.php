<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIfUserDoesntSeeHome()
    {
        $this->get(route('home'))
        ->assertRedirect('login')
        ->assertStatus(302);
    }

    public function testIfUserSeeHome()
    {

        Model::unguard();

       $user = factory(User::class)->create(['active' => true]);

       $this->actingAs($user)
           ->get(route('home'))
           ->assertSee('Home');
    }

    //Rodar somente um test vendor/bin/phpunit --filter=LoginTest
}
