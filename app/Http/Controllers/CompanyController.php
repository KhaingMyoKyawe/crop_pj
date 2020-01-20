<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Category;
use App\Subcategory;
use App\User;
use Auth;
use App\Recordlist;

class CompanyController extends Controller
{
    public function __construct($value='')
    {
        $this->middleware('isCompany',['except'=>['index','show']]);
    }
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

       $companies=DB::table('companies')
             ->join('users','users.id','=','companies.userid')
             ->join('categories','categories.id','=','companies.categoryid')
             ->join('subcategories','subcategories.id','=','companies.subcategoryid')
             ->select('companies.*','categories.name as cname','subcategories.name as scname','users.name as uname')
             ->paginate(6);
        //dd($companies);
        return view('company.index',compact('recordlists','companies','categories'));
        
    }else{

        $companies=DB::table('companies')
             ->join('users','users.id','=','companies.userid')
             ->join('categories','categories.id','=','companies.categoryid')
             ->join('subcategories','subcategories.id','=','companies.subcategoryid')
             ->select('companies.*','categories.name as cname','subcategories.name as scname','users.name as uname')
             ->paginate(6);
        //dd($companies);
        return view('company.index',compact('companies','categories'));

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
       


        $authid = Auth::user()->id;
        $recordlists = DB::table('recordlists')
                        ->join('userinfos','userinfos.user_id','=','recordlists.userid')
                        ->select('recordlists.*','userinfos.status')
                        ->where('recordlists.userid',$authid)
                        ->get();

         $subcategories =Subcategory::all();

        // dd($categories);
        return view('company.create',compact('recordlists','categories','subcategories'));

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
            "title"=>"required",
            "minprice"=>"required",
            "maxprice"=>"required",
            "minamount"=>"required|max:2",
            "maxamount"=>"required|max:191",
            "description"=>"required",
            "image"=>"sometimes|mimes:jpeg,jpg,png|max:5000"
        //     "image"=>"required|mimes:jpeg,jpg,png|max:5000",
            
            ]);

        //If include file, upload here
        if ($request->hasfile('image')){
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/image/',$name);
            $image = '/image/'.$name;
        }
        //Save data
        Company::create([
            "subcategoryid"=>request('subtype'),
            "categoryid"=>request('type'),
            "userid"=>Auth::user()->id,//'title'= input name //"title"=database column name
            'title'=>request('title'),
            'minamount'=>request('minamount'),
            'minprice'=>request('minprice'),
            'maxamount'=>request('maxamount'),
            'maxprice'=>request('maxprice'),
             "image"=> $image,
            'description'=>request('description'),
           
            
            // "user_id"=>Auth::user()->id
        ]);
        //Redirect
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
         $categories =Category::all();
        
        
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
             ->where('companies.id','=',$id)
             ->get();
        //dd($companies);
        return view('company.show',compact('recordlists','companies','categories'));
        }else{
            $companies=DB::table('companies')
              ->join('users','users.id','=','companies.userid')
             ->join('categories','categories.id','=','companies.categoryid')
             ->join('subcategories','subcategories.id','=','companies.subcategoryid')
             ->select('companies.*','categories.name as cname','subcategories.name as scname','users.name as uname')
             ->where('companies.id','=',$id)
             ->get();
        //dd($companies);

            return view('company.show',compact('companies','categories'));
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
        $categories = Category::all();
        $subcategories= Subcategory::all();
        if(Auth::check()){
            
        $authid = Auth::user()->id;
        $recordlists = DB::table('recordlists')
                        ->join('userinfos','userinfos.user_id','=','recordlists.userid')
                        ->select('recordlists.*','userinfos.status')
                        ->where('recordlists.userid',$authid)
                        ->get();
        
        $company = Company::find($id);
        return view('company.edit',compact('recordlists','company','subcategories','categories'));
        }else{
            
             return view('company.edit',compact('company','subcategories','categories'));
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
        $company=Company::find($id);
        $company->title=request('title');
        $company->image=$image;
        $company->minamount=request('minamount');
        $company->minprice=request('minprice');
        $company->maxamount=request('maxamount');
        $company->maxprice=request('maxprice');
        $company->description=request('description');
        $company->categoryid=request('type');
        $company->subcategoryid=request('subtype');
        $company->userid=Auth::user()->id;
        $company->save();

        return redirect()->route('company.index',$id);
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
        $post = Company::find($id);
        $post->delete();


        return redirect('/');
    }

    public function subcategorylist(Request $request)
    {
        //dd($request);
        $category_id = $request('category_id');
        //dd($category_id);
    }

    public function getCategory(Request $request)
    {
        // dd($request);  
        $data = Subcategory::select('name','id')->where('categoryid',$request->id)->get();
        return response()->json($data);
    }

    
}
