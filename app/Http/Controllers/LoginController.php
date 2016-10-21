<?php

namespace Pathology\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Pathology\Http\Requests;

use Pathology\Http\Requests\LoginRequest;
use Pathology\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    /**
     * Handles  login for both patient and operator
     * @param LoginRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(LoginRequest $request)
    {

        $user = User::where('pass_code', $request->input('pass_code'))->first();

        if (strcasecmp($user->name, $request->input('name')) !== 0 )
            return redirect('/login')
                    ->withInput()
                    ->with("message", "Please enter the correct name");

        Auth::login($user);

        if ($user->isOperator())
            return redirect('/operator/home');
        return redirect('/home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
