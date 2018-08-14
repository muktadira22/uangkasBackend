<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\User;
use Illuminate\Http\Request;

class KelasController extends Controller
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

    public function index(Request $request)
    {
        $api_token = $request->api_token;
        $user = User::where('api_token', $api_token)->first();
        $idUser = $user->id;
        $kelas = $user->kelas();

        return $kelas;
    }
}
