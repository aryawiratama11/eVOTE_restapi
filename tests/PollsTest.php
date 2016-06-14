<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PollsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInsertGroup()
    {

        $response = $this->call('POST', '/api/addPoll', ['pll_name' => 'test poll', 'description' => 'testing!',
        'editable' => 'NO', 'deadline' => '2030-05-05']);

        $this->assertEquals(201,$response->status());
    }

    
}
