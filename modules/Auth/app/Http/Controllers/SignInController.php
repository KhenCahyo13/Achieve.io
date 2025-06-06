<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('core.dashboard');
        }

        return view('auth::pages.signin.index');
    }
}
