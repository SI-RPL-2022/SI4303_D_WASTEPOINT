<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PBI16Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group pbi16
     * @return void
     */
    public function testUpdateProfile()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('login')
                ->type('email', 'andibudiman@gmail.com')
                ->type('password', 'cobacoba')
                ->press('Login')
                ->click('.dropdown-toggle > span')
                ->clickLink('Edit Profil')
                ->assertRouteIs('user.edit-profil')
                ->type('name', 'Andi Budiman')
                ->type('nomorhp', '081231765701')
                ->type('address',  'Jl. Sesama Masyarakat No. 2, Kel. Petakilan, Kec. Pasar Minggu, Jakarta Selatan, DKI Jakarta')
                ->press('Simpan Perubahan')
                ->assertSeeIn('.alert', 'Profil berhasil diupdate!');
        });
    }
}
