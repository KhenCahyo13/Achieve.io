<?php

namespace Modules\Master\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePermissionsController extends Controller
{
    public function index()
    {
        return view('master::pages.role-permissions.index');
    }
}
