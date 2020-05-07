<?php

use Illuminate\Http\Request;
use App\User;
use App\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('users', function() {

    $user = user::all();
    if(count($user) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ];

    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $user
        ];
    }

    return $feedback;

});

Route::get('category', function() {

    $Category = Category::orderBy('id','asc')->get();
    if(count($Category) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ];

    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $Category
        ];
    }

    return $feedback;

});



Route::post('login', function(Request $request) {

    $user = user::where('email',$request->email)->where('password',$request->password)->get();
    
    if(count($user) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ];

    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $user
        ];
    }

    return json_encode($feedback);

});



Route::post('register', function(Request $request) {
    
    $user = new user;
    $user->name = $request->name;
    $user->address = $request->address;
    $user->occupation = $request->occupation;
    $user->mobile = $request->mobile;
    $user->telephone_no = $request->telephone_no;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->role = $request->role;
    $user->items = $request->items;
    $user->date_of_formation = $request->date_of_formation;
    $user->organization_type = $request->organization_type;
    $user->save();
    
    $feedback = [
       'status'     => "success",
       'message'    => "data found",
       'data'       => $request->all()
    ];

    return json_encode($feedback);

});

Route::get('users/{id}', function($id) {

    $user = user::where('user_id',$id)->first();
    if($user == null){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ];

    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $user
        ];
    }

    return $feedback;

});



