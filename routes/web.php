<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('/userinfo','UserinfoController');
Route::resource('/','MainController');
//Route::resource('admin','AdminController');


Route::resource('company','CompanyController');
Route::resource('profile','ProfileController');
Route::resource('seller','SellerController');
Route::resource('comment','CommentController');

Route::post('/comment/update','CommentController@update')->name('comment_update');

Route::post('/comment/destroy','CommentController@destroy')->name('comment_delete');


Route::post('/getcomments','CommentController@getcomments')->name('getcomments');

Route::resource('admin/','AdminController');

Route::prefix('admin')->name('admin.')->group(function(){
	
Route::resource('category','CategoryController');
Route::resource('subcategory','SubcategoryController');
Route::resource('list','ListController');
Route::resource('recordlist','RecordlistController');
Route::resource('postlist','PostlistController');
Route::resource('sellerpost','SellerpostController');
Route::resource('bcomment','BackcommentController');
Route::resource('message','MessageController');
});

Route::post('/records','RecordlistController@records')->name('records');
Route::post('/recordlist/destroy','RecordlistController@recordlist_destroy')->name('recordlist_destroy');


Auth::routes();

Route::get('getCategory','CompanyController@getCategory');
Route::get('getsubCategory','SellerController@getsubCategory');


Route::get('getCategorycedit','CposthistoryController@getCategorycedit');
Route::get('getCategorysedit','SposthistoryController@getCategorysedit');

Route::resource('cposthistory','CposthistoryController');

Route::resource('sposthistory','SposthistoryController');

Route::resource('about','AboutController');

Route::resource('blog','BlogController');
Route::resource('dropdown','DropdownController');

Route::resource('contact','ContactController');

