<?php

namespace Modules\Master\Http\Controllers;

use App\Http\Controllers\Controller;

class RolePermissionsController extends Controller
{
    public function index()
    {
        return view('master::pages.role-permissions.index');
    }

    public function create()
    {
        return view('master::pages.role-permissions.create');
    }

    public function edit($id)
    {
        return view('master::pages.role-permissions.edit', compact('id'));
    }
}
