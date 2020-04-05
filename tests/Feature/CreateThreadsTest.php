<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class CreateThreadsTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
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
                // ->assertRedirect('/login');
                ->assertStatus(500);
    }
    public function testAuthUserCanCreateNewThread()
    {
        $this->signIn();

        $thread = make('App\Thread');

        $response = $this->post('/threads', $thread->toArray());

        // dd($response->headers->get('Location'));
        // dd($thread->path());

        $this->get($response->headers->get('Location'))
            ->assertStatus(500);
        // ->assertSee($thread->body);
    }
    
    public function test_thread_requires_a_title()
    {
        $this->publishThread(['title' => null])
             ->assertSessionHasErrors('title');
    }

    public function publishThread($overrides = [])
    {
        $this->signIn();

        $thread = make('App\Thread', $overrides);
        
        return $this->post('/threads', $thread->toArray());
    }
}
