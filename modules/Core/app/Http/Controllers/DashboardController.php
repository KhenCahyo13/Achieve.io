<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('core::pages.dashboard.index');
    }
}
