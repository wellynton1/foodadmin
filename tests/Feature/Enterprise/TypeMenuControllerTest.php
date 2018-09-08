<?php

namespace Tests\Feature\Enterprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeMenuControllerTest extends TestCase
{
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

    }



}
