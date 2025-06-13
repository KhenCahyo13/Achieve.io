<?php

namespace Modules\Master\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master::pages.user.index');
    }
}
