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


Route::get('/', function () {
    return view('login');
});
Route::post('/login', 'Main@login')->name('login');
Route::get('viewRecipt','Main@viewRecipt');

Route::get('/charity-register', function(){
    $category = category::all();
    return view('charity-register',compact('category'));
})->name('charity-register');
Route::post('/charity-register', 'Main@registerCharity')->name('charity-register-post');

Route::get('/donor-register', function(){
    return view('donor-register');
})->name('donor-register');
Route::post('/donor-register', 'Main@registerDonor')->name('donor-register-post');

Route::get('/charity/home', 'Main@charityHome');
Route::get('/donor/home','Main@donorHome');
Route::get('/donor/{id}', 'Main@donationForm');
Route::get('/donation/{id}', 'Main@donationDetails');

Route::post('/donor/charity-list', 'Main@charityList')->name('getCharityList');

Route::post('/donor/submit', 'Main@makeDonation')->name('donation-submit');


Route::get('/test-user', 'Main@testUser');
Route::post('/donationFormSubmit', 'Main@donationFormSubmit');

Route::get('/test-donation', 'Main@testDonation');

Route::get('/charity/getDonationForm', function(){
    $district = district::all();
    $thana = Thana::all();
    if(isset(Session::get('swift_trade_user_data')['cat_id'])){
        $subcategory = subcategory::where('category_id',Session::get('swift_trade_user_data')['cat_id'])->get();
        return view('getDonationForm',compact('subcategory','district','thana'));
    }
    else{
        return view('getDonationForm',compact('subcategory','district'));
    }

});

