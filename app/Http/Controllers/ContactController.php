<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Message;
use Illuminate\Support\Facades\DB;
use Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $categories =Category::all();
         if(Auth::check()){
         $authid = Auth::user()->id;
        $recordlists = DB::table('recordlists')
                        ->join('userinfos','userinfos.user_id','=','recordlists.userid')
                        ->select('recordlists.*','userinfos.status')
                         ->where('recordlists.userid',$authid)
                        ->get();
        return view('contact.index',compact('recordlists','categories'));
         }else{
             
              return view('contact.index',compact('categories'));
    }
    
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
    public function store(Request $request)
    {
        //
         //validation
         $request->validate([
            "name"=>"required",
            "email"=>"required",
            "subject"=>"required",
            "message"=>"required"
        ]);
        //save data
        Message::create([
            "name"=>request('name'),
            "email"=>request('email'),
            "subject"=>request('subject'),
            "message"=>request('message'),
        ]);

         return redirect('/');

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
