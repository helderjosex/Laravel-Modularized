<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Domains\Users\User;

class SiteTest extends DuskTestCase
{

    /**
     * Test Landing Page.
     *
     * @return void
     */
    public function testLandingPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });

    }

    /**
     * Test Landing Page.
     *
     * @return void
     */
    public function testLandingPageWithUserLogged()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create();
            $this->actingAs($user);
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    /**
     * Test Login Page.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Inscreva-se para iniciar sua sessão');
        });

    }
}
