<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $items = User::all()->sortDesc();
        return view('pages.pengguna', compact('items'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telp' => ['required', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->telp,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', $request->name.' berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        if ($request->update) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users,username,'. $id],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $id],
                'telp' => ['required', 'max:255', 'unique:users,telp,'. $id],
                'role' => ['required'],
            ]);

            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'telp' => $request->telp,
                'role' => $request->role,
            ]);
    
            return redirect()->back()->with('success', $request->name.' berhasil diubah!');
        }
        
        $request->validate([
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah!');
    }

    public function destroy($id)
    {
        $item = User::find($id);
        $title = $item->name;
        $item->delete();

        return redirect()->back()->with('success', $title.' dihapus!');
    }
}
