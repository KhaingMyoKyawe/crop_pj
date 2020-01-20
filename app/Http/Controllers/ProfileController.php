<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Userinfo;
use Auth;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
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
        $categories= Category::all();
           $user = User::find($id);
           
           $authid = Auth::user()->id;
            $recordlists = DB::table('recordlists')
                            ->join('userinfos','userinfos.user_id','=','recordlists.userid')
                            ->select('recordlists.*','userinfos.status')
                            ->where('recordlists.userid',$authid)
                            ->get();

       /*$userinfo = Userinfo::all();*/

         return view('profile.edit',compact('recordlists','user','categories'));
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
        //dd($request);
        //validate
        $request->validate([
            "name" => "required|min:3|max:191",
            "image" => "sometimes|mimes:jpeg,jpg,png|max:5000",
            "email" => "required"
            
        ]);

         //file upload
         if($request->hasfile('image')){
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/image/',$name);
            $image = '/image/'.$name;
        }
        else
        {
            $image = request('oldimg');
        }
       /* dd($image);*/
         //update data
        $user = User::find(Auth()->id());
        $userinfo = Userinfo::find($id);

        $user->name = request('name');
        $user->email = request('email');

        $userinfo->image = $image;      
        
        
       /* dd($user,$userinfo);*/
        
        $user->save();
        $userinfo->save();

        //redirect
         return redirect('/');
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