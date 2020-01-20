<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Company;
use App\User;
use App\Category;
use App\Subcategory;

class CposthistoryController extends Controller
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
        $id=Auth::user()->id;

        $recordlists = DB::table('recordlists')
                        ->join('userinfos','userinfos.user_id','=','recordlists.userid')

                        ->select('recordlists.*','userinfos.status')
                        ->where('recordlists.userid',$id)
                        ->get();
            
        $cposts=DB::table('companies')
                    ->join('users','users.id','=','companies.userid')
                    ->join('categories','categories.id','=','companies.categoryid')
                    ->join('subcategories','subcategories.id','=','companies.subcategoryid')
                    ->where('companies.userid',$id)
                    ->select('companies.*','users.name as name','categories.name as cname','subcategories.name as scname')
                    ->paginate(6);
                    ///dd($cposts);
                    return view('cposthistory.index',compact('recordlists','cposts','categories'));
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

        //dd($id);
        ///$userid=User::find($id);
         $categories =Category::all();

         $authid = Auth::user()->id;
        $recordlists = DB::table('recordlists')
                        ->join('userinfos','userinfos.user_id','=','recordlists.userid')

                        ->select('recordlists.*','userinfos.status')
                        ->where('recordlists.userid',$authid)
                        ->get();
        $cposts=DB::table('companies')
            ->join('users','users.id','=','companies.userid')
            ->join('categories','categories.id','=','companies.categoryid')
            ->join('subcategories','subcategories.id','=','companies.subcategoryid')
            
            ->select('companies.*','categories.name as cname','subcategories.name as scname','users.name as uname')->where('companies.id',$id)
            ->get();

        
        return view('cposthistory.show',compact('recordlists','cposts','categories'));
       
        
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
       $categories = Category::all();
        $subcategories= Subcategory::all();
        $cpost = Company::find($id);
        if(Auth::check()){
        
        $authid = Auth::user()->id;
        $recordlists = DB::table('recordlists')
                        ->join('userinfos','userinfos.user_id','=','recordlists.userid')
                        ->select('recordlists.*','userinfos.status')
                        ->where('recordlists.userid',$authid)
                        ->get();
        return view('cposthistory.edit',compact('recordlists','cpost','subcategories','categories'));
         }else{
             return view('cposthistory.edit',compact('cpost','subcategories','categories'));
         }
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
        if ($request->hasfile('image')){
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/image/',$name);
            $image = '/image/'.$name;
        }else
        {
            $image = request('oldimg');
        }



        //Update data
         $cpost = Company::find($id);
         $cpost->title = request('title');
         $cpost->description = request('body');
         $cpost->image = $image;
         $cpost->categoryid = request('category');
         $cpost->subcategoryid = request('subtype');
         $cpost->userid = Auth::user()->id;
         $cpost->save();


        //redirect
           return redirect()->route('cposthistory.show',$id);
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
         $categories =Category::all();
        $cpost = Company::find($id);
        $cpost->delete();


        return redirect()->route('cposthistory.index',compact('categories'));
    }

    public function getCategorycedit(Request $request)
    {
        // dd($request);  
        $data = Subcategory::select('name','id')->where('subcategories.categoryid',$request->id)->get();
        return response()->json($data);
    }
}
