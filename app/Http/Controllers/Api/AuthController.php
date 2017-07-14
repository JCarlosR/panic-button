<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $credentials = ['email' => $email, 'password' => $password];

        $data = [];
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $email)->first();
            $data['user'] = $user;
            $data['success'] = true;
            return $data;
        } else {
            $data['success'] = false;
            $data['user'] = null;
            return $data;
        }
    }
}
