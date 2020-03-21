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
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');
        $response->assertSee($thread->title);
    }

    public function testSinglethread()
    {
        $thread = factory('App\Thread')->create();

        
        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);
    }
}
