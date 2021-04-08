<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('uploads.index');
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
}
