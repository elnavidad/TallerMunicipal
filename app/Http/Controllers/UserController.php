<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use Illuminate\Http\Request;


class UserController extends Controller
{
    
    function __construct() {
        $this->middleware('ajax')->only(['datatable', 'userexists']);
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('user.index', [ 'user'=>new User() ]);
    }

    public function userexists(Request $request)
    {   
        $user = $request->input('username').$request->input('company');
        $before = $request->input('before').$request->input('company');
        $valid = isset($before) && $before === $user;
        $data = User::where('email', $user)->first();
        return $data && !$valid ? "false" : "true";
    } 

    public function changePassword()
    {
        return view('user.password');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        return (int) $user->update($request->all());
    }

    public function toggleActive(User $user)
    {
        $active = $user->active > 0 ? 0 : 1;
        return (int) $user->update(["active"=>$active]);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['email'] = $data['username'].$data['company'];
        return User::create($data);
    }
    
    public function datatable()
    {
        $p = $this->getPermission('user');
        $data = User::with(['role', 'dependency', 'department'])->get();
        if(isset($p))
            foreach($data as $d)
                $d['p'] = array('a'=>true && $p->u,'e'=>$p->u,'d'=>$p->d);
        return datatables()->of($data)->toJson();
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, User $user)
    {
        $password = $request->input('password');
        if(isset($password))
            $user->update(['password'=>$password]);
        return (int)$user->update([
            'username'=>$request->input('username'), 
            'name'=>$request->input('name'),
            'email'=>$request->input('username').$request->input('company'),
            'dependency_id'=>$request->input('dependency_id'),
            'department_id'=>$request->input('department_id'),
            'role_id'=>$request->input('role_id')
        ]);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        return (int)$user->delete();
    }
}