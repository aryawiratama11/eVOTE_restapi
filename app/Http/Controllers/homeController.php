<?php

namespace App\Http\Controllers;

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
        $users = DB::table('users')->get();

        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //DB::insert('insert into users (id, name,password) values (?, ?)', [1, 'Dayle']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertUser(Request $request){

        $params = $request->only('id','name','password');

        $namePara = $params['name'];
        $idPara = $params['id'];
        $passPara = $params['password'];
        $remember = Hash::make('name');

        DB::insert('insert into users (id,name,password,remember_token) values (?,?,?,?)', [$idPara,$namePara,$passPara,$remember]);

        return $this->response->created();
    }
    public function store(Request $request)
    {
        //
    }

    public function authenticate(Request $request){

        $params = $request->only('name','password');

        $namePara = $params['name'];
        $passPara = $params['password'];

        $password = DB::table('users')->where('name', $namePara)->value('password');
        if ($passPara == $password && $passPara != ''){
            $data = DB::table('users')->where('name', $namePara)->get();
            return $data;
        }
        else{
            return "not found";
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
