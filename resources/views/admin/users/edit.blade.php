@extends('templates.main')

@section('content')
    <h1>Edit User</h1>
    <form method="post" action="{{route('admin.users.update', $user->id)}}">
        @csrf
        @method('PUT')
        @include('admin.users.partials.form')
        <button type="submit" class="btn btn-primary"> Update </button>
    </form>
@endsection
