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
            'all_user' => User::where('email', '!=', 'admin@gmail.com')->get(),
        ]);
    }

    public function edit(int $id)
    {
        if (auth()->guard()->user()->role_id != 3) {
            $user = User::findOrFail($id);

            return view('userAccess.edit', [
                'title' => 'Form Edit UserAccess',
                'data_edit' => $user,
                'roles' => Role::all(),
            ]);
        } else {
            abort(403, 'Forbidden');
        }
    }

    public function update(Request $request, int $id)
    {
        $validateData = $request->validate([
            'name' => 'max:120|unique:users,name,' . $id,
            'email' => 'max:50|unique:users,email,' . $id,
            'role_id' => 'max:50',
        ]);

        User::where('id', $id)->update($validateData);

        return redirect()->route('user-access')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy(int $id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('user-access')->with('success', 'Data Berhasil Dihapus!');
    }
}