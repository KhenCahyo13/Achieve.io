<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('core.dashboard');
        }

        return view('auth::pages.signup.index');
    }

    public function verify(string $id) {
        return view('auth::pages.signup.verify');
    }
}
