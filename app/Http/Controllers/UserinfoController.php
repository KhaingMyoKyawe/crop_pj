<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Userinfo;
use Auth;
use App\Category;


class UserinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::all();
         $authid = Auth::user()->id;
        $recordlists = DB::table('recordlists')
                        ->join('userinfos','userinfos.user_id','=','recordlists.userid')

                        ->select('recordlists.*','userinfos.status')
                        ->where('recordlists.userid',$authid)
                        ->get();
        return view('userinfo',compact('recordlists','categories'));
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


        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'phoneno' => 'required|min:5',
            'address' => 'required|min:3'
            
        ]);

        //Upload files
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image -> move(public_path().'/image/',$name);
            $image = '/image/'.$name;
        }  
        

        // Store Data
        Userinfo::create([
            "user_id" => Auth::user()->id,
            "image" => $image,
            "phno" => request('phoneno'),
            "address" => request('address'),
            "timelength" => request('timelength'),
            "status"    =>0        

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
