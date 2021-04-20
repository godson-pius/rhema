<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{   
    public function index()
    {
        $tag = Tag::get();
        return view('uploads.index', [
            'tags' => $tag
        ]);
    }

    // For storing the uploads
    public function store(Request $request)
    {

        $path = asset(str_replace("public", "storage", $request->file('url')->store('public')));
        $path2 = asset(str_replace("public", "storage", $request->file('image')->store('public')));


        $this->validate($request, [
            'title' => 'required|max:255',
            'minister' => 'required|max:255',
            'url' => 'required',
            'image' => 'required',
            'tag' => 'required|max:255',
        ]);

        Upload::create([
           'title'  => $request->title,
           'minister'  => $request->minister,
           'url' => $path,
           'image' => $path2,
           'tag' => $request->tag,
           'user_id' => auth()->user()->id,
        ]);

        return back()->with('status', 'Upload Successful');
    }

    // Display the whole uploads
    public function show()
    {
        $uploads = Upload::latest()->paginate(20);
        return view('index', [
            'uploads' => $uploads
        ]);
    }

    public function edit(Upload $upload)
    {
        $specific_post = $upload;
        $tag = Tag::get();
        // dd($specific_post->title);

        return view('uploads.edit', [
            'posts' => $specific_post,
            'tags' => $tag,
        ]);
    }

    public function update(Request $request, Upload $upload)
    {
        // dd($upload->id);
        // $data = $request->except('_method','_token','submit');

        $path = asset(str_replace("public", "storage", $request->file('url')->store('public')));
        $path2 = asset(str_replace("public", "storage", $request->file('image')->store('public')));


        $this->validate($request, [
            'title' => 'required|max:255',
            'minister' => 'required|max:255',
            'url' => 'required',
            'image' => 'required',
            'tag' => 'required|max:255',
        ]);

        $update = Upload::find($upload->id);
        
        $update->title = $request->title;
        $update->minister = $request->minister;
        $update->url = $path;
        $update->image = $path2;
        $update->tag = $request->tag;

        if ($update->save()) {
            return redirect()->route('main')->with('update', "Rhema have been updated");
        }
    }

    public function delete(Upload $upload)
    {
        Upload::destroy($upload->id);
        return redirect()->route('main')->with('delete', "Rhema was deleted successfully");
    }
}
