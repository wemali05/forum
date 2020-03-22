<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testThreadHasReplies()
    {
        $thread = factory('App\Thread')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $thread->replies);
    }

    public function testThreadHasCreator()
    {
        $thread =  factory('App\Thread')->create();

        $this->assertInstanceOf('App\User', $thread->creator);
    }
}
