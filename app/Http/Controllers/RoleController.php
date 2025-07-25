<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
            "data_role" => Role::orderBy('id', 'asc')->get(),
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

        return redirect()->route('role_home')->with('success', 'Data Role Berhasil Ditambah');
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

        return redirect()->route('role_home')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->route('role_home')->with('success', 'Data Berhasil DiHapus');
    }
}