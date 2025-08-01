<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\Role;
use App\Models\RolePermissions;
use App\Models\User;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        $user = User::findOrFail($id);
        $current = RolePermissions::where('role_id', $user->role_id)->pluck('permission_id')->toArray();
        return view('userAccess.edit', [
            'title' => 'Form Edit UserAccess',
            'data_edit' => $user,
            'roles' => Role::all(),
            'permissions' => Permissions::all(),
            'current_permissions' => $current,
        ]);
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

    // input check permission function
    public function toggle(Request $request)
    {
        $request->validate([
            'role_id' => 'required|integer',
            'permission_id' => 'required|integer',
            'action' => 'required|in:attach,detach',
        ]);

        if ($request->action === 'attach') {
            RolePermissions::firstOrCreate([
                'role_id' => $request->role_id,
                'permission_id' => $request->permission_id,
            ]);
            return response()->json(['message' => 'Permission attached']);
        } else {
            RolePermissions::where([
                'role_id' => $request->role_id,
                'permission_id' => $request->permission_id,
            ])->delete();
            return response()->json(['message' => 'Permission detached']);
        }
    }
}
