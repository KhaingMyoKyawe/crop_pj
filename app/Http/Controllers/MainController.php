<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Seller;
use App\User;
use App\Category;
use App\Subcategory;
use Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $categories = Category::all();
       
      /*$companies=DB::table('companies')
             ->join('users','users.id','=','companies.userid')
             ->join('categories','categories.id','=','companies.categoryid')
             ->join('subcategories','subcategories.id','=','companies.subcategoryid')
             ->select('companies.*','categories.name as cname','subcategories.name as scname','users.name as uname')
             ->get();
         

        $sellers=DB::table('sellers')
             ->join('users','users.id','=','sellers.userid')
             ->join('categories','categories.id','=','sellers.categoryid')
             ->join('subcategories','subcategories.id','=','sellers.subcategoryid')
             ->select('sellers.*','categories.name as cname','subcategories.name as scname','users.name as uname')
             ->get();
       return view('main.index',compact('companies','sellers','categories'));*/

       if(Auth::check()){
        $authid = Auth::user()->id;
        $recordlists = DB::table('recordlists')
                        ->join('userinfos','userinfos.user_id','=','recordlists.userid')
                        ->select('recordlists.*','userinfos.status')
                        ->where('recordlists.userid',$authid)
                        ->get();

        $companies=DB::table('companies')
             ->join('users','users.id','=','companies.userid')
             ->join('categories','categories.id','=','companies.categoryid')
             ->join('subcategories','subcategories.id','=','companies.subcategoryid')
             ->select('companies.*','categories.name as cname','subcategories.name as scname','users.name as uname')
             ->paginate(6);
           
             
        $sellers = DB::table('sellers')
                ->join('users','users.id','=','sellers.userid')
                ->join('categories','categories.id','=','sellers.categoryid')
                ->join('subcategories','subcategories.id','=','sellers.subcategoryid')
                ->select('sellers.*','users.name as uname','categories.name as cname','subcategories.name as scname')
                ->paginate(6);
                

        return view('main.index',compact('recordlists','companies','sellers','categories'));

       }else{

       $companies=DB::table('companies')
             ->join('users','users.id','=','companies.userid')
             ->join('categories','categories.id','=','companies.categoryid')
             ->join('subcategories','subcategories.id','=','companies.subcategoryid')
             ->select('companies.*','categories.name as cname','subcategories.name as scname','users.name as uname')
             ->paginate(6);
                          
        $sellers = DB::table('sellers')
                ->join('users','users.id','=','sellers.userid')
                ->join('categories','categories.id','=','sellers.categoryid')
                ->join('subcategories','subcategories.id','=','sellers.subcategoryid')
                ->select('sellers.*','users.name as uname','categories.name as cname','subcategories.name as scname')
                ->paginate(6);
                

        return view('main.index',compact('companies','sellers','categories'));

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
          $categories =Category::all();
       
        // dd($categories);
        return view('dropdown.create',compact('categories'));
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
