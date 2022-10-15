@extends('templates.main')

@section('content')
    <h1>Create New User</h1>
    <form method="post" action="{{route('admin.users.store')}}">
        @csrf
        @include('admin.users.partials.form' ,['create' => true])
        <button type="submit" class="btn btn-primary"> Create </button>
    </form>
@endsection
