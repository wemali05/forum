<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInForumTest extends TestCase
{
    use RefreshDatabase;
    /**test
     */
    
    // public function testUnAuthUserMayNotAddReplies()
    // {
    //     $this->expectException('Illuminate\Auth\AuthenticationException');
    //     $this->post('/threads/1/replies', []);
    // }
            
    public function testAuthUserMayParticipateInForumThread()
    {
        // $user = factory('App\User')->create();
        $this->be($user = factory('App\User')->create());
        $thread = factory('App\Thread')->create();

        // when the user adds areply to a thread
        $reply = factory('App\Reply')->make();

        // dd($thread->path(). '/replies');
        
        $this->post('/threads/'.$thread->id. '/replies', $reply->toArray());

        // then the reply should br visible on the page
        $this->get($thread->path())
          ->assertSee($thread->body);
    }

    // public function test_reply_requires_a_body()
    // {
    //     // $this->singIn();
        
    //     $thread = create('App\Thread');
    //     $reply = make('App\Reply', ['body' => null]);

    //     $this->post($thread->path(). '/replies', $reply->toArray())
    //          ->assertSessionHasErrors('body');
    // }
}
