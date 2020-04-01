<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ChannelTest extends TestCase
{
  

    /**test
     */
    public function test_channel_consist_of_threads()
    {
        $channel = create('App\Channel');

        $thread = create('App\Thread', ['channel_id' => $channel->id]);

        $this->assertTrue($channel->threads->contains($thread));
    }
}
