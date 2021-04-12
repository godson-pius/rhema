@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group p-5">
        
            <h3 class="">Upload Post</h3>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="text" name="title" class="form-control p-3 mb-2" placeholder="Enter title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <input type="text" name="minister" class="form-control p-3 mb-2" placeholder="Enter minister">
                @error('minister')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <span class="text-secondary p-3 ">Add mp3</span>
                <input type="file" name="url" class="form-control p-3 mb-2">
                @error('url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <span class="text-secondary p-3 ">Add image</span>
                <input type="file" name="image" class="form-control p-3 mb-2">
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
                <button type="submit" class="btn btn-primary">Upload</button>
                <a href="/" class="btn btn-secondary">Go back</a>
            </form>
        </div>
    </div>  
@endsection