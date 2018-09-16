<?php

namespace Tests\Browser\Enterprise;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FeedstockControllerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('enterprise.feedstock.create.get'))
                ->type('name', 'teste')
                ->type('minimum_stock', '100')
                ->type('id_unit_of_measurement', '1')
                ->press('Salvar')

                ->assertSee('Listagem');
        });
    }
}
