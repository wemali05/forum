<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadsTest extends TestCase
{
    use RefreshDatabase;

    /**test*/
    // public function testGuestsMayNotCreateThreads()
    // {
    //     $this->expectException('Illuminate\Auth\AuthenticationException');

    //     $thread = make('App\Thread');

    //     $this->post('/threads', $thread->toArray());
    // }
    
    public function test_guests_cannnot_create_thread()
    {
        $this->get('/threads/create')
                ->assertRedirect('/login');
    }
    public function testAuthUserCanCreateNewThread()
    {
        $this->signIn();

        $thread = make('App\Thread');

        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
            ->assertStatus(200);
        // ->assertSee($thread->body);
    }
}
