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
    Route::get("/", [
        "as" => "homepage",
        function () {
            $posts = \App\Post::orderBy("Created_at", "asc")->get();
            return view("homepage", [
                "posts" => $posts,
            ]);
        },
    ]);

    Route::get("signin", [
        "as" => "signin",
        "uses" => "Auth\AuthController@getLogin",
    ]);

    Route::post("signin", [
        "as" => "signin",
        "uses" => "Auth\AuthController@postLogin",
    ]);

    //Sign out is better as a POST due to cross-site attacks
    Route::post("signout", [
        "as" => "signout",
        "uses" => "Auth\AuthController@logout",
    ]);
  
    Route::get("register", [
        "as" => "register",
        "uses" => "Auth\AuthController@getRegister"
    ]);

    Route::post("register", [
        "as" => "register",
        "uses" => "Auth\AuthController@postRegister"
    ]);

    Route::get("newpost", [
        "as" => "newpost",
        "uses" => "PostController@newPost",
    ]);

    Route::post("newpost", [
        "as" => "createpost",
        "uses" => "PostController@store",
    ]);

    Route::get("update/{post}", [
        "as" => "updatepost",
        "uses" => "PostController@updatepost",
    ])->where("id", "[0-9]+");

    Route::put("update/{post}", [
        "as" => "updatepost",
        "uses" => "PostController@update",
    ])->where("id", "[0-9]+");

    Route::get("{post}", [
        "as" => "viewpost",
        "uses" => "PostController@viewPost",
    ])->where("id", "[0-9]+");

    Route::delete("{post}", [
        "as" => "deletepost",
        "uses" => "PostController@destroy",
    ])->where("id", "[0-9]+");
});


//API - Does not use cookies. Uses basic auth.
Route::group(['middleware' => ['auth.basic']], function () {
    //Return a JSON list of current posts.
    //Does not strictly need authentication but is required as per-user rate limiting way be added later.
    Route::get("api/1.0/posts", "PostController@api1List");

    Route::post("api/1.0/posts", "PostController@api1CreatePost");

    Route::get("api/1.0/posts/{post}", "PostController@api1PostDetails")->
        where("id", "[0-9]+");

    Route::put("api/1.0/posts/{post}", "PostController@api1Update")->
        where("id", "[0-9]+");

    Route::delete("api/1.0/posts/{post}", "PostController@api1Delete")->
        where("id", "[0-9]+");

    //It's not currently possible to get user details with the API.
});
