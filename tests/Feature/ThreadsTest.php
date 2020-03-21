<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    /**test*/

    use RefreshDatabase;
    
    /**test*/

    public function testBrowserThreads()
    {
        $response = $this->get('/threads');

        $response->assertStatus(200);
    }
}
