<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth::pages.forgot-password.index');
    }

    public function resetPage(string $id) {
        return view('auth::pages.forgot-password.reset', compact('id'));
    }
}
