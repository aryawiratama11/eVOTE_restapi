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
//    public function testInsertGroup()
//    {
//
//        $response = $this->call('POST', '/api/addPoll', ['pll_name' => 'test poll', 'description' => 'testing!',
//        'editable' => 'NO', 'deadline' => '2030-05-05']);
//
//        $this->assertEquals(201,$response->status());
//    }
//
//    public function testInsertGrpUsrAdPll()
//    {
//
//        $response = $this->call('POST', '/api/addUserPollGroup',
//            ['pll_name' => 'test poll', 'description' => 'testing!','createdby' => 9,'group'=> 1]);
//
//        $this->assertEquals(201,$response->status());
//    }

//    public function testGetByName()
//    {
//
//        $response = $this->call('POST', '/api/getPollByName',
//            ['pll_name' => 'test poll', 'description' => 'testing!','createdby' => 9,'group'=> 1]);
//
//        $this->assertEquals(200,$response->status());
//
//    }

    public function testRemovePoll()
    {
        $poll_id= 20;
        $response = $this->call('GET', '/api/removePoll/'.$poll_id);

        $this->assertEquals(201, $response->status());
    }
}
