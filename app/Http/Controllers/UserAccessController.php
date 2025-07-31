<?php

namespace App\Http\Controllers;

use App\Models\Role;
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

    public function edit(int $id)
    {
        return view('userAccess.edit', [
            'title' => 'Form Edit UserAccess',
            'data_edit' => User::findOrFail($id),
            'roles' => Role::all(),
        ]);
    }
}
