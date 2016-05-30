<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testgetUsers()
    {

        $response = $this->call('GET', '/api/getUsers');

        $this->assertEquals(200, $response->status());
    }

    public function testgetUserVote()
    {
        $user_id = 1;
        $poll_id = 1;
        $response = $this->call('GET', '/api/getUserVote/'.$user_id . '/poll/'.$poll_id);

        $this->assertEquals(200, $response->status());
    }

    public function testgetUserGroup()
    {
        $user_id= 1;
        $response = $this->call('GET', '/api/getUserGroups/'.$user_id);

        $this->assertEquals(200, $response->status());
    }

    public function testpostUser()
    {
        $response = $this->call('POST', '/api/addUser', ['name' => 'TaylorSwift', 'password' => '1234oct07']);

        $this->assertEquals(201,$response->status());
    }

    public function testAuthenticate()
    {
        $response = $this->call('POST', '/api/authenticate', ['name' => 'TaylorSwift', 'password' => '1234oct07']);

        $this->assertEquals(200,$response->status());

    }

    
}
