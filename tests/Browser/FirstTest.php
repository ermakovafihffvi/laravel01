<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FirstTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravel.loc/admin')
                    ->click('a[name="addcategories"')
                    ->clear('slug')
                    //->screenshot('addcat'); //очистилось первое поле slug
                    ->press('.btn-primary')
                    ->screenshot('bugWithAdding'); //повилась ошибка в массиве
        });
    }
}
