<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

// use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    // use RefreshDatabase;
    // use TestCase;


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHasOwner()
    {
        $reply = factory('App\Reply')->create();

        $this->assertInstanceOf('App\User', $reply->owner);
    }
}
