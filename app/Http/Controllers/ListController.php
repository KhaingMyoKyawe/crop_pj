<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = DB::table('users')
                ->join('userinfos','users.id','=','userinfos.user_id')
                ->select('users.*','userinfos.*')
                ->where('status','=',0)
                ->get();
        //$lists = User::all();//all data select
        // dd($lists);
        return view('list.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$lists = User::all();//all data select
        //dd($lists);
        return view('list.create',compact('lists'));*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*//Validation
        $request->validate([
            //key(input name) => value
            "name" => "required|min:3|max:191",
            "email" => "required",
            "password" => "required",
            "role" => "required"
        ]);*/

        //recall model at the top
        User::create([
            //key(database table col name) => value(input name)
            "name" => request('name'),
            "email" =>request('email'),
            "password" => Hash::make(request('password')),
            "role" => request('role')
        ]);

        //Redirect
        return redirect()->route('admin.list.index');
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
        //Delete
        $lists = User::find($id);
        $lists->delete();

        //Redirect
        return redirect()->route('admin.list.index');
    }
}
