<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(10);

        if (Gate::denies('logged-in')){
            $request->session()->flash('error' , 'You are Not Logged In');

            return view('index');
        }

        if (Gate::allows('is-admin')){
            return view('admin.users.index',compact('users'));
        }
        $request->session()->flash('error' , 'You are Not An Admin');
        return view('index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validateData = $request->validated();

        $user = User::create($validateData);

        $user->roles()->sync($request->roles);

        return redirect(route('admin.users.index'))->with('success' , 'You have Created the user Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.users.edit', compact('roles' , 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $validateData = $request->validated();

        $user = User::findOrFail($id);

        $user->update($validateData);

        $user->roles()->sync($request->roles);

        $request->session()->flash('success' , 'You Have Updated the user Successfully');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        User::destroy($id);

        return redirect(route('admin.users.index'))->with('success' , 'You have deleted the user');
    }
}
