<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class userController extends Controller
{
    function register_user(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $input = $request->only('username');

        $input['password'] = Hash::make($request->password , [ 'round' => 12 ]);
        $input['role'] = 'user';

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

        $select = User::where('username', $username)->first();

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

    function review(Request $request){
        $request->validate([
            'id_destination' => 'required',
            'rating' => 'required',
            'review' => 'required',
        ]);

        $input = $request->only('id_destination' , 'rating' , 'review');
        $input['id_user'] = Auth::guard('web')->id();

        $insert = review::create($input);
        if (!$insert){
            return response([
                'message' => 'data cant be inserted'
            ]);
        }

        return response([
            'message' => 'data inserted'
        ]);
    }

    function search(Request $request){
        $request->validate([
            'key' => 'required'
        ]);

        $key = $request->key;

        $search = Destination::where('name' , 'LIKE' ,"%".$key."%")->get();

        return response([
            'data' => $search
        ]);
    }
}
