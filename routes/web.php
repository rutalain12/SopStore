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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('upload-files','FileController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//Route::post('/search', function(){
   //$q = Input::get('q');
   //if($q != ""){
       //$products = Product::where('name','like', '%' .$q .'%')
                        // ->orwhere('sopName', 'like', '%' .$q .'%')
                       //  ->get();
            // if(count($products)> 0)
             //return view('files.index')->withDetails($products)->withQuery($q);  
     //}
    //return view('files.index')->withMessage('No Data found!');
   //});

