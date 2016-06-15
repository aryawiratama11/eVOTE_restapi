<?php

namespace App\Http\Controllers;

use App\Choice;
use App\Vote;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class voteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $poll_id
     * @return \Illuminate\Http\Response
     */
    public function getVoteSummary($poll_id)
    {
        $results = DB::select('SELECT COUNT(c.choice_ID) as amount,c.choice FROM `votes` v INNER JOIN choices c ON v.choice_ID = c.choice_ID WHERE v.poll_ID = :id GROUP BY c.choice_ID', ['id' => $poll_id]);


        return $results;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertPollChoices(Request $request)
    {

        DB::table('choices')->insert($request->all());

        Log::info($request);

    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function insertVote(Request $request)
    {
        $date  = date('Y-m-d H:i:s');

        Log::info($date);
        Log::info($request->all());
        $vote = new Vote();
        $vote->user_ID = $request->user_ID;
        $vote->poll_ID = $request->poll_ID;
        $vote->choice_ID = $request->choice_ID;
        $vote->time = $date;
        $vote->save();

        return $this->response->created();
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
}
