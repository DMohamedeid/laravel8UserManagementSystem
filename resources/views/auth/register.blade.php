@extends('templates.main')

@section('content')
    <h1>Register</h1>
    <form method="post" action="{{route('register')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label"> Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" id="name" aria-describedby="name" value="{{old('name')}}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" id="email" aria-describedby="email" value="{{old('email')}}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" id="password" value="{{old('password')}}">
            @error('password')
            <span class="invalid-feedback" role="alert">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror " name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}">
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                {{$message}}
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"> Register</button>
    </form>
@endsection
