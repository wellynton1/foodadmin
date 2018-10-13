<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function postLogin(LoginRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) {

            return redirect()->intended('/');

        }

        return redirect('/login')->withErrors([
            'error' => 'Credenciais incorretas',
        ]);


    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function getLogout()
    {

        Auth::logout();

        return redirect()->route('login');

    }
}
