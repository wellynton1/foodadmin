<?php

namespace Tests\Feature\Enterprise;

use App\Http\Controllers\Enterprise\TypeMenuController;
use App\Services\Enterprise\TypeMenuService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
class TypeMenuControllerTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_view_get_create()
    {
        $this->get(route('enterprise.typemenu.create.get'))
            ->assertSee('cardápio');
    }

    public function test_a_user_can_create_type_menu()
    {

        $data = [
            'name' => 'Teste 1'
        ];

       $response = $this->post(route('enterprise.typemenu.create.post', $data));

        //$response->assertRedirect(route('enterprise.typemenu.list.get'));

        $this->assertDatabaseHas('type_menus', [
            'name' => 'Teste 1'
        ]);

    }



}
