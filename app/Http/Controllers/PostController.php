<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function newPost() {
        //A user must be logged in to create a new post
        return view("newpost");
    }

    public function updatePost($post) {
        $post = \App\Post::findOrFail($post);
        return view("updatepost", [
            "post" => $post,
        ]);
    }

    public function viewpost($post) {
        $post = \App\Post::findOrFail($post);
        return view("viewpost", [
            "post" => $post,
        ]);
    }


    public function store(Request $request) {
        //If validation fails they will be redirected back where they came. Errors will be flashed.
        $this->validate($request, [
            "want" => "required|max:255",
            "have" => "required|max:255",
            "details" => "required|max:255",
        ]);

        $request->user()->posts()->create([
            "want" => $request->want,
            "have" => $request->have,
            "details" => $request->details,
        ]);

        return redirect()->route("homepage");
    }

    public function update(Request $request, \App\Post $post) {
        $this->authorize("update", $post);

        $this->validate($request, [
            "want" => "required|max:255",
            "have" => "required|max:255",
            "details" => "required|max:255",
        ]);

        $post->want = $request->want;
        $post->have = $request->have;
        $post->details = $request->details;
        $post->save();

        return redirect()->route("homepage");
    }

    public function destroy(Request $request, \App\Post $post) {
        $this->authorize("destroy", $post);
        //They have permission to delete it
        $post->delete();
        return redirect()->route("homepage");
    }

}
