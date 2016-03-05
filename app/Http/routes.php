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

    //Sign out should not be a get due to cross-site attacks
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

    //We do not currently have emails working.
    //Route::get("resetpassword", "Auth\PasswordController@sendResetLinkEmail");
    //Route::get("resetpassword/{token}", "Auth\PasswordController@showResetForm");
    //Route::post("resetpassword", "Auth\PasswordController@reset");

    Route::get("newpost", [
        "as" => "newpost",
        "uses" => "PostController@newPost",
    ]);

    Route::delete("api/1.0/{post}", [
        "as" => "deletepost",
        "uses" => "PostController@destroy",
    ])->where("id", "[0-9]+");

    Route::get("update/{post}", [
        "as" => "updatepost",
        "uses" => "PostController@updatepost",
    ])->where("id", "[0-9]+");

    Route::post("update/{post}", [
        "as" => "updatepost",
        "uses" => "PostController@update",
    ])->where("id", "[0-9]+");

    Route::get("{post}", [
        "as" => "viewpost",
        "uses" => "PostController@viewPost",
    ])->where("id", "[0-9]+");
});




//API

Route::post("api/1.0/post", [
    "as" => "createpost",
    "uses" => "PostController@store",
]);

Route::get("api/1.0/posts", function () {
    //Return a JSON list of current posts
});
Route::get("api/1.0/posts", function () {
    //Create a new post
});

Route::get("api/1.0/posts/{post}", function () {
    //Return JSON about the post
})->where("id", "[0-9]+");

Route::post("api/1.0/posts/{post}", function () {
    //Edit the post with id. Post the values.
})->where("id", "[0-9]+");

Route::delete("api/1.0/posts/{post}", function () {
    //Delete
})->where("id", "[0-9]+");
/*
Route::put("api/1.0/posts/{post}", [
    "as" => "updatepost",
    "uses" => "PostController@update",
])->where("id", "[0-9]+");
*/





