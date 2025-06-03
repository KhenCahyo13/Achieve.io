<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;

class SignInController extends Controller
{
    public function index()
    {
        return view('auth::pages.signin');
    }
}
