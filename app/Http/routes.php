<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
  //We need sessions and CSRF for pretty much everything.
  Route::get("/", function () {
      return view("base");
  });
  
  //A page letting the user log in
  Route::get("login", "Auth\AuthController@getLogin");

  //Post data to attempt log in. Returns to homepage
  Route::post("login", "Auth\AuthController@postLogin");
  
  //Post data to log out
  Route::post('logout', [
    "as" => "logout",
    "uses" => "Auth\AuthController@logout"
  ]);
  
  //A page to allow a user to register
  Route::get("register", "Auth\AuthController@getRegister");
  
  //Create the new user
  Route::post("register", "Auth\AuthController@postRegister");

  //Screen to allow user to ask to reset the password
  Route::get("resetpassword", "Auth\PasswordController@sendResetLinkEmail");

  //Screen to let you reset password (from a link in an email)
  Route::get("resetpassword/{token}", "Auth\PasswordController@showResetForm");

  //Actually do the reset
  Route::post("resetpassword", "Auth\PasswordController@reset");
});


//API

Route::get("api/1.0/list", function () {
    //Return a JSON list of current posts
});

Route::get("api/1.0/{id}", function () {
    //Return JSON about the post
});

Route::post("api/1.0/{id}", function () {
    //Edit the post with id. Post the values.
});

Route::delete("api/1.0/{id}", function () {
    //Delete a post with id.
});



Route::get("{id}", function ($id) {
    //Show details about that post
});

Route::get("edit/{id}", function () {
    //Show a page to let them edit the post (if they own it)
});

