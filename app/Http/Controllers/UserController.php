<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    public function userRoleForm($userId)
    {   
        $user = User::find($userId);
        $roles = Role::all();
        
        return view('backend.user.role_form', compact('user','roles'));
    }   

    public function setUserRole(Request $request)
    {   
        $validatedData = $request->validate([
            'role' => 'required',
        ]);

        if(empty($validatedData))
        {
            return Redirect::back()->withErrors($validatedData);
        }
        else 
        {   
            $user = User::find($request->user_id);
            $user->assignRole($request->role);
            
            return Redirect::to('user-role-setting/'.$request->user_id)->with('successMsg', 'User Role Set Successfuly');
        }
    }
}
