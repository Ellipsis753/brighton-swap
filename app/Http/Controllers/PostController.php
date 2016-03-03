<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
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
        $this->authorize("edit", $post);

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
