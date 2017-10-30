<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\Http\Requests\UserRequest;
use Illuminate\Database\Seeder;

class UsersController extends Controller
{
    public function signup()
    {
        return view('users.signup');
    }
    public function signup_store(UserRequest $request)
    {

        $newUser = Sentinel::registerAndActivate(array(           
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password
        ));

        
        $writerrole = Sentinel::findRoleByName('Writer');
        $newUser->roles()->attach($writerrole);

        
        Session::flash('notice', 'Success create new user');
        return redirect()->back();
    }
}
