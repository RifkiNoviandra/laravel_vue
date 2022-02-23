<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class authController extends Controller
{
    function register_admin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $input = $request->only('username');

        $input['password'] = Hash::make($request->password , [ 'round' => 12 ]);
        $input['role'] = 'admin';

        $insert = User::create($input);

        if (!$insert){
            return response([
                'message' => "Data Can't Be Processed"
            ]);
        }

        return response([
            'message' => 'data inserted'
        ]);


    }

    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;

        $select = User::where('username', $username)->where('role' , 'admin')->first();

        if (!$select) {
            return response([
                'message' => 'Username Salah'
            ]);
        }

        if (!Hash::check($request->password, $select->password)) {
            return response([
                'message' => 'Password Salah'
            ]);
        }

        $token = Str::random(8);

        $select->token = $token;
        $select->save();

        return response([
            'token' => $token
        ]);
    }

    function logout(Request $request)
    {

        $id = Auth::guard('web')->id();

        $select = User::where('id', $id)->first();
        if (!$select) {
            return response([
                'message' => 'invalid Data'
            ]);
        }
        $select->token = null;
        $select->save();
        Auth::guard('web')->logout();

        return response([
            'message' => 'sukses logout'
        ]);
    }
}
