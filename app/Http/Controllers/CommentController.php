<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comment;
use Auth;
class CommentController extends Controller
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
        //dd($request);
        //validation
        $request->validate([
            'comment' =>'required',
            'seller_id' =>'required']);

        //data insert
        Comment::create([
            'body'=>request('comment'),
            'sellerid'=>request('seller_id'),
            "userid"=>Auth::user()->id

        ]);

        return response('success');
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
         $categories =Category::all();
        $comment=Comment::find($id);
        return view('comment.edit',compact('comment','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        //validation
        $request->validate([
            'comment' =>'required',
            'seller_id' =>'required'
        ]);

        $id=request('comment_id');
        
        //data update
        $comment=Comment::find($id);
        $comment->body=request('comment');
        $comment->sellerid=request('seller_id');
        $comment->userid=Auth::user()->id;
        $comment->save();

       return response('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        
        $id=request('comment_id');        
        $comment=Comment::find($id);
        $comment->delete();        
        return response($comment);
        //return redirect()->route('seller.index');
    }

    
    public function getComments(Request $request)
    {
        //dd($request);
        $sellerid=request('seller_id');
        // dd($sellerid);
       /* $comments=Comment::where('post_id',$post_id)->get();*/
       $authid = Auth::user()->id;

       $comments=DB::table('comments')
       ->join('users','users.id','=','comments.userid')
       ->join('userinfos','userinfos.user_id','=','comments.userid')
       ->where('comments.sellerid',$sellerid)
       ->orderBy('comments.id','desc')
       ->select('comments.*','users.name as uname','userinfos.image as userimage')
       ->get();
       //dd($comments);
       //return response($comments);
       
        return response()->json([
            'comments' => $comments,
            'authid' => $authid
        ]); 
       // dd(request('post_id'));
    }
}
