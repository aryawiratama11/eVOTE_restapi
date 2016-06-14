<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GroupsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInsertGroup()
    {

        $response = $this->call('POST', '/api/addGroup', ['group_name' => 'Science test', 'description' => 'science class paper team!']);

        $this->assertEquals(201,$response->status());
    }

    public function testInsertGrpAndUsr()
    {

        $response = $this->call('POST', '/api/addUserGroup', ['group_name' => 'Science test', 'description' => 'science class paper team!','createdby' => 9]);

        $this->assertEquals(201,$response->status());
    }
    
    
}
