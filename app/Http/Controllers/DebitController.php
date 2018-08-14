<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Debit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $role = Auth::user()->role;
        if($role == 'user') {
            return 'Tampilan User';
        } else if($role == 'kelas') {
            return 'Tampilan KElas';
        } else if($role == 'admin') {
            return 'Tampilan Admin';
        }
        // return $role;
    }

    public function data(Request $request){
        $user = User::where('api_token', $request->api_token)->first();
        $status = $user->kelas;
        return $status;
    }
}
