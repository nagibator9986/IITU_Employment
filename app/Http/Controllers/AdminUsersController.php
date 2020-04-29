<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\Specialty;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $specialties = Specialty::lists('name', 'id')->all();
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.create', compact('roles', 'specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input =$request->all();
            $input['password'] = bcrypt($request->password);
        }
        $user = User::create($input);
        if($input['specialty'] != null)
            $user->specialty()->attach($input['specialty']);
        return redirect('/admin/users');
//        return $request->all();
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
        //
        $user = User::findOrFail($id);
        $roles = Role::lists('name', 'id')->all();
        $specialties = Specialty::lists('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles', 'specialties'));
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
        $user = User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input =$request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($request['specialty'] != null){
            $user->specialty()->detach();
            $user->specialty()->attach($request['specialty']);
        }

        $user->update($input);



        if($user->role->name=="ROLE_ADMIN")
            return redirect('admin/users');
        else
            return redirect('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->specialty()->detach();
        $user->jobs()->specialty()->detach();
        $user->jobs()->delete();
        $user->delete();
        return redirect('/admin/users');
    }
}
