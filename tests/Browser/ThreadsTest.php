<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**test */
    public function testBrowserThreads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/threads')
                    ->assertSee('Laravel');
        });
    }
}
