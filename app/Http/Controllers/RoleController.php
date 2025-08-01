<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\Role;
use App\Models\RolePermissions;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("role.role", [
            "title_role" => "Manage tabel role",
            "data_role" => Role::where('id', '!=', '1')->orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create', [
            "title_role_create" => "Form Tambah Role",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_role' => 'required|unique:role,name|max:150',
            'handle_acc_role' => 'required|max:150',
        ]);

        Role::create([
            'name' => $validateData['nama_role'],
            'handle_access' => $validateData['handle_acc_role'],
        ]);

        return redirect()->route('role_home')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('role.edit', [
            'title_form_edit' => 'Form Edit Role',
            'data_edit' => Role::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nama_role' => 'required|max:150',
            'handle_role' => 'required|max:120',
        ]);

        Role::where('id', $id)->update([
            'name' => $validateData['nama_role'],
            'handle_access' => $validateData['handle_role']
        ]);

        return redirect()->route('role_home')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->route('role_home')->with('success', 'Data Berhasil Dihapus');
    }

    public function permission(int $id)
    {
        $role = Role::findOrFail($id);
        $current = RolePermissions::where('role_id', $role->id)->pluck('permission_id')->toArray();
        return view('role.permission', [
            'title' => 'Manage Role Permission',
            'permissions' => Permissions::all(),
            'current_permissions' => $current,
            'data_edit' => $role,
        ]);
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
