<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;

class SignUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth::pages.signup');
    }
}
