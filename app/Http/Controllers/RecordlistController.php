<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recordlist;
use Auth;
use App\Userinfo;
use Illuminate\Support\Facades\DB;

class RecordlistController extends Controller
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


        if($request->hasfile('image')){
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image -> move(public_path().'/image/',$name);
            $image = '/image/'.$name;
        }

        //Data insert
        $recordlists = Recordlist::create([
            //'image' => $image,
            'userid' => request('userid'),
            'phno' => request('phno'),
            'address' => request('address'),
            'timelength' => request('timelength')
        ]);

        $userinfo_userid = request('userid');
        $userinfo_id = request('userinfoid');
        $userinfo_image = request('image');
        $userinfo_phno = request('phno');
        $userinfo_address = request('address');
        $userinfo_timelength = request('timelength');

        $userinfo = Userinfo::find($userinfo_id);
        $userinfo->user_id = $userinfo_userid;
        $userinfo->image = $userinfo_image;
        $userinfo->phno = $userinfo_phno;
        $userinfo->address = $userinfo_address;
        $userinfo->timelength = $userinfo_timelength;
        $userinfo->status = 1;
        $userinfo->save();

        //dd($recordlists);



        return response('success');

        // return redirect()->route('admin.list');
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
        $recordid = request('recordid');
        //dd($recordid);
        $recordlists = Recordlist::find($id);
        $recordlists->delete();

        //Redirect
        return redirect()->route('admin.recordlist.index');
    }

    public function records(Request $request)
    {  
        // $recordlists = Recordlist::all();
        $recordlists = DB::table('recordlists')
                ->join('users','users.id','=','recordlists.userid')
                ->select('recordlists.*','users.name')
                ->get();
        
        return response($recordlists);
    }

    public function recordlist_destroy(Request $request){
        //dd($request);
        $record_id = request('record_id');
        //dd($recordid);
         $record = DB::table('recordlists')
            ->where('recordlists.id', '=', $record_id)
            ->delete();
        return response($record);  
    }
}
