<?php

namespace App\Http\Controllers;

use App\Poll;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class pollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $group_id
     * @return \Illuminate\Http\Response
     */
    public function index($group_id)
    {


        $polls = DB::table('group_poll_user')
            ->join('groups', 'groups.id', '=', 'group_poll_user.group_id')
            ->join('polls', 'polls.id', '=', 'group_poll_user.poll_id')
            ->join('users', 'users.id', '=', 'group_poll_user.user_id')
            ->select('polls.*','groups.group_name','users.name')
            ->where('groups.id',$group_id)
            ->get();

        return $polls;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertPoll(Request $request)
    {
        $poll = new Poll();
        $poll->pll_name = $request->pll_name;
        $poll->description = $request->description;
        $poll->editable = $request->editable;
        $poll->deadline = $request->deadline;
        $poll->save();
        
        

        return $this->response->created();
    }

    /**
     * Display the specified resource.
     *
     * @param $poll_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($poll_id)
    {
        //$data = DB::table('polls')->where('poll_ID', $poll_id)->get();

        $data = Poll::where('id',$poll_id)->first()->toArray();
        
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getChoices($poll_ID)
    {
        $data = Poll::find($poll_ID)->choices()->get()->toArray();

        return $data;
    }
    
    
}
