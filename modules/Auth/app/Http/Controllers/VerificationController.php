<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function email(string $id)
    {
        return view('auth::pages.verification.email', compact('id'));
    }
}
