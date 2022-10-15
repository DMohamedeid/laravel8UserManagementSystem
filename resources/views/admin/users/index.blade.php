@extends('templates.main')

@section('content')
    <div class="card shadow p-3 mb-5 rounded">

        <div class="card-header text-center m-1">
            <h1 class="float-lg-none d-inline"> Users</h1>
            <a class="btn btn-success float-end w-25" href="{{route('admin.users.create')}}"> Creat New User </a>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th class="text-center">#Id</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th class="text-center"> {{$user->id}} </th>
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.users.edit' , [$user->id])}}"> Edit </a> /
                        <a class="btn btn-danger"
                           onclick="event.preventDefault(); document.getElementById('delete-form-{{$user->id}}').submit()">
                            Delete
                        </a>
                        <form id="delete-form-{{$user->id}}" method="post" action="{{route('admin.users.destroy' , [$user->id])}}" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
