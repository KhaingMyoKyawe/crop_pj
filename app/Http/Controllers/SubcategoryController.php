<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

          //
         $categories =Category::all();
        $subcategories=DB::table('subcategories')
             ->join('categories','categories.id','=','subcategories.categoryid')
             ->select('subcategories.*','categories.name as cname','subcategories.name as scname')
              ->paginate(6);
             //dd($sellers);
      return view('subcategory.index',compact('subcategories','categories'));


        /*$subcategories = Subcategory::all();
        $categories = Category::all();
        return view('subcategory.index',compact('subcategories','categories'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('subcategory.create',compact('subcategories','categories'));

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
        $request->validate([
            "name" => "required|min:3|max:191"
        ]);

        Subcategory::create([
            "name" => request('name'),
            "categoryid" => request('categoryid')
        ]);
        return redirect()->route('admin.subcategory.index');
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
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        return view('subcategory.edit',compact('subcategory','categories'));
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
        // dd($id);
        $request->validate([
            "name" => "required|min:3"
        ]);

        $subcategory = Subcategory::find($id);
        $subcategory->name = request('name');
        $subcategory->categoryid = request('categoryid');
        $subcategory->save();

        return redirect()->route('admin.subcategory.index',$id);
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
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        return redirect()->route('admin.subcategory.index',compact('categories'));
    }
}
