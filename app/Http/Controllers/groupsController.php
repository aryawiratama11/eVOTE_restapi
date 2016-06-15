<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\User_Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class groupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $user_id
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {

        $groups = User::find($user_id)->groups()->get()->toArray();
//        $users = DB::table('user_group')
//        ->join('groups', 'groups.group_ID', '=', 'user_group.grp_id')
//        ->join('users', 'users.id', '=', 'user_group.usr_id')
//        ->select('groups.*')
//        ->where('users.id',$user_id)
//        ->get();

        return $groups;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function insertUsersIntoGroup(Request $request)
    {
        DB::table('user_group')->insert($request->all());

        Log::info($request);

        return $this->response->created();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertGroup(Request $request)
    {
        $group = new Group();
        $group->group_name = $request->group_name;
        $group->description = $request->description;
        $group->save();

        return $this->response->created();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function insertUserGroup(Request $request)
    {
        $group = Group::where('group_name',$request->group_name)->where('description',$request->description)->first();

        $u_g = new User_Group();
        $u_g->group_ID = $group->id;
        $u_g->user_ID = $request->createdby;
        $u_g->save();

        return $this->response->created();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $group_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function getGroupUsers($group_id)
    {

        $users = DB::table('user_group')
        ->join('groups', 'groups.id', '=', 'user_group.group_id')
        ->join('users', 'users.id', '=', 'user_group.user_id')
        ->select('users.*')
        ->where('groups.id',$group_id)
        ->get();

        return $users;
    }

    /**
     * Update the specified resource in storage.
     * @param $group_id
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function getUserNiGroup($group_id)
    {

        $results = DB::select('SELECT * FROM users m LEFT OUTER JOIN user_group s ON (m.id = s.user_ID AND s.group_ID = :id) WHERE s.group_ID IS NULL', ['id' => $group_id]);
        Log::info($results);
        
        return $results;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $group_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($group_id)
    {
        DB::table('groups')->where('id',$group_id)->delete();

        return $this->response->created();
    }
}
