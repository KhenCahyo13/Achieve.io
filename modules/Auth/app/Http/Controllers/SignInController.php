<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Auth\Http\Requests\SignInRequest;

class SignInController extends Controller
{
    public function index()
    {
        return view('auth::pages.signin');
    }
}
