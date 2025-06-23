<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::where('role', 'petugas')->get();
        return view('admin.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas',
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil ditambahkan.');
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
    public function edit(User $petuga)
    {
        return view('admin.petugas.edit', compact('petuga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $petuga)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $petuga->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $petuga->name = $request->name;
        $petuga->email = $request->email;
        if ($request->filled('password')) {
            $petuga->password = Hash::make($request->password);
        }
        $petuga->save();

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $petuga)
    {
        $petuga->delete();
        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil dihapus.');
    }
}
