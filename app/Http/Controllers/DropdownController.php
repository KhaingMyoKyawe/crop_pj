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

class DropdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* //
        $categories =Category::all();
        //dd($categories);

       
         $ddcompanies=DB::table('companies')
             ->join('categories','categories.id','=','companies.categoryid')
             ->join('users','users.id','=','companies.userid')
             //->where('categories','categories.id','=',)
             ->select('companies.*','users.name as namec')
             ->get();
            //dd($ddcompanies);

               $ddsellers=DB::table('sellers')
             ->join('categories','categories.id','=','sellers.categoryid')
             ->join('users','users.id','=','sellers.userid')
             ->select('sellers.*','users.name as names')
             ->get();
            // dd($ddsellers);
               return view('dropdown.index',compact('ddcompanies','ddsellers','categories'));*/
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
        $categories = Category::all();
        
        if(Auth::check()){
        $authid = Auth::user()->id;
        $recordlists = DB::table('recordlists')
                        ->join('userinfos','userinfos.user_id','=','recordlists.userid')

                        ->select('recordlists.*','userinfos.status')
                        ->where('recordlists.userid',$authid)
                        ->get();
        
        $ddcompanies = DB::table('companies')
                ->join('categories','categories.id','=','companies.categoryid')
                ->join('users','users.id','=','companies.userid')
                ->where('companies.categoryid','=',$id)
                ->select('companies.*','users.name')
                 ->paginate(6);

        $ddsellers = DB::table('sellers')
                ->join('categories','categories.id','=','sellers.categoryid')
                 ->join('users','users.id','=','sellers.userid')
                ->where('sellers.categoryid','=',$id)
                ->select('sellers.*','users.name')
                ->paginate(6);

        return view('dropdown.index',compact('recordlists','ddcompanies','ddsellers','categories'));
        }else{

        $ddcompanies = DB::table('companies')
                ->join('categories','categories.id','=','companies.categoryid')
                ->join('users','users.id','=','companies.userid')
                ->where('companies.categoryid','=',$id)
                ->select('companies.*','users.name')
               ->paginate(6);

        $ddsellers = DB::table('sellers')
                ->join('categories','categories.id','=','sellers.categoryid')
                 ->join('users','users.id','=','sellers.userid')
                ->where('sellers.categoryid','=',$id)
                ->select('sellers.*','users.name')
                ->paginate(6);

        return view('dropdown.index',compact('ddcompanies','ddsellers','categories'));
        }
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
