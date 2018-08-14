<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if(!$user) {
            return response()->json(['status' => 'error', 'message' => 'user not found'], 401);
        }

        if(Hash::check($request->password, $user->password)) {
            $user->update(['api_token' => str_random(50)]);
            return response()->json(['status' => 'success', 'user' => $user], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'invalid Credentials'], 401);
    }

    public function register(Request $request) {
        $rules = [
            'username' => 'required|min:4',
            'password' => 'required|min:8',
            'role' => 'required'
        ];

        $this->validate($request, $rules);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['api_token'] = str_random(50);

        $status = User::create($input);

        if($status)
        {
            return response()->json(['status' => 'success', 'message' => 'user has been created', 'user' => $input]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not been Created']);
        }
    }

    public function logout(Request $request) {
        $api_token = $request->api_token;

        $user = User::where('api_token', $api_token)->first();

        if(!$user || $api_token != $user->api_token) {
            return response()->json(['message' => 'Unauthhorized user'], 401);
        } else {
            $user->api_token = null;
            $user->save();
            return response()->json(['message' => 'Logout Success'], 200);
        }
    }
}
