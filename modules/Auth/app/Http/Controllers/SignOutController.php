<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SignOutController extends Controller
{
    public function action()
    {
        Auth::logout();

        return redirect()->route('auth.signin.index');
    }
}
