<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
{
    return view('account.login');
}
public function showadminLogin()
{
    return view('admin-account.admin-login');
}
public function showRegistration()
{
    return view('account.register');
}

public function showEmailVerification()
{
    return view('account.create-using-email');
}

}
