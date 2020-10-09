<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post (Request $request) {


        if($request->hasFile('thumbnail')){
            // Get filename with the extension
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('thumbnail')->storeAs('public/thumbnails', $fileNameToStore);

            // make thumbnails
            $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->thumbnail = $fileNameToStore;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->back()->with('success', 'Posted!');
    }

    public function delete ($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success','Deleted!');
    }

    public function edit (Request $request)
    {
        $post = Post::find($request->id);


        if($request->hasFile('thumbnail')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('thumbnail')->storeAs('public/thumbnails', $fileNameToStore);

            // make thumbnails
            $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
        } else {
            $fileNameToStore = $post->thumbnail;
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->thumbnail = $fileNameToStore;
        $post->save();
        return redirect()->back()->with('success','Edited');
    }
}
