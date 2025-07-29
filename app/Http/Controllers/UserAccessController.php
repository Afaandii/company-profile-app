<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAccessController extends Controller
{
    public function index()
    {
        return view('userAccess.userAccess', [
            'title' => 'Manage Table UserAccess',
            'all_user' => User::all(),
        ]);
    }
}
