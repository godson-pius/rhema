@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group p-5">
        
            <h3 class="">Edit Rhema</h3>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if ($posts)
                <form action="{{ route('update', $posts) }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="text" name="title" value="{{ $posts->title }}" class="form-control p-3 mb-2" placeholder="Enter title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <input type="text" name="minister" value="{{ $posts->minister }}" class="form-control p-3 mb-2" placeholder="Enter minister">
                @error('minister')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <span class="text-secondary p-3 ">Add mp3</span>
                <input type="file" name="url" required class="form-control p-3 mb-2">
                @error('url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <span class="text-secondary p-3 ">Add image</span>
                <input type="file" name="image" required class="form-control p-3 mb-2">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <select class="form-control p-3 mb-2" name="tag">
                    
                    @if ($tags->count())
                        @foreach ($tags as $tag)
                            <option>{{ $tag->name }}</option>
                        @endforeach
                    @endif

                </select>
                @error('tag')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <button type="submit" class="btn btn-primary">Update Rhema</button>
                <a href="/" class="btn btn-secondary">Go back</a>
            </form>
            @endif
            
        </div>
    </div>  
@endsection