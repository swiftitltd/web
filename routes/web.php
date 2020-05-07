<?php

use App\user;
use App\Category;
use App\Subcategory;
use App\District;
use App\Thana;

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


Route::get('/getSubcat', function () {
    $catid = $_GET['getSubcat'];
    $subcat = Subcategory::select('id','name')->where('category_id',$catid)->get();
    return response()->json($subcat);
});

Route::get('/getThana', function () {
    $getThanaid = $_GET['getThana'];
    $subcat = Thana::select('id','name')->where('district_id',$getThanaid)->get();
    return response()->json($subcat);
});


Route::get('/donation-platform', function () {
    return view('login');
});
Route::get('/', function () {
    return view('landing');
});
Route::post('/login', 'Main@login')->name('login');
Route::get('viewRecipt/{id}','Main@viewRecipt');

Route::get('/invoice','Main@generateInvoice')->name('invoice');

Route::get('/charity-register', function(){
    $category = category::all();
            
        $district = district::orderBy('name','asc')->get();
    return view('charity-register',compact('category','district'));
})->name('charity-register');
Route::post('/charity-register', 'Main@registerCharity')->name('charity-register-post');

Route::get('/donor-register', function(){
    $category = category::all();
            
        $district = district::orderBy('name','asc')->get();
    return view('donor-register',compact('category','district'));
})->name('donor-register');

Route::post('/donor-register', 'Main@registerDonor')->name('donor-register-post');

Route::get('/charity/home', 'Main@charityHome')->name('charity-home');
Route::get('/donor/home','Main@donorHome')->name('donar.home');
Route::get('/donor/{id}', 'Main@donationForm');
Route::get('/donation/{id}', 'Main@donationDetails');

Route::post('/donor/charity-list', 'Main@charityList')->name('getCharityList');

Route::post('/donor/submit', 'Main@makeDonation')->name('donation-submit');


Route::get('/test-user', 'Main@testUser');
Route::post('/donationFormSubmit', 'Main@donationFormSubmit');
Route::post('/financialInfoSubmit', 'Main@financialInfoSubmit');

Route::get('/test-donation', 'Main@testDonation');

Route::get('/charity/getDonationForm', function(){
    $district = district::orderBy('name','asc')->get();
    $thana = Thana::all();
    if(isset(Session::get('swift_trade_user_data')['cat_id'])){
        //$subcategory = subcategory::where('category_id',Session::get('swift_trade_user_data')['cat_id'])->get();
        
        $subcategory = category::all();
        
        return view('getDonationForm',compact('subcategory','district','thana'));
    }
    else{
        return view('getDonationForm',compact('subcategory','district'));
    }

});

