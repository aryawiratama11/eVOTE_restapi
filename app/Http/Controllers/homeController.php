<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $users = DB::select('select * from users')->get();
//        $users = DB::table('users')->get();
        $users = User::all()->toArray();

        return $users;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function insertUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();

        return $this->response->created();
    }

    public function store(Request $request)
    {
        //
    }

    public function authenticate(Request $request)
    {
        $user = User::where('name', $request->name)->first();
        if (empty($user) || empty($request->password)) {
            return "not found";
        }

        if (Hash::check( $request->password,$user->password)) {
            //authenticated
            return response()->json(['name' => $user->name, 'id' => $user->id]);
        } else {
            return "not found";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getVote($user_id,$poll_id)
    {
        $vote = User::find($user_id)->votes()->where('poll_ID',$poll_id)->get()->toArray();

        return $vote;

    }
}
