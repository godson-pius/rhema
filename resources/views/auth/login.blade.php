@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group p-5">
            <h3 class="">Login</h3>

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif 

            <form action="{{ route('login') }}" method="post">
                @csrf

                <input type="email" name="email" class="form-control p-3 mb-2" placeholder="Enter email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <input type="password" name="password" class="form-control p-3 mb-2" placeholder="Enter password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>

                <button type="submit" class="btn btn-primary shadow">Login</button>
                <a href="{{ route('register') }}" class="btn btn-outline-dark">Register</a>
            </form>
        </div>
    </div>  
@endsection