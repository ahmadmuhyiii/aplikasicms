<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('pelanggan.profil.index', [
            'users' => User::all()
        ]);
    }

    public function edit(User $user)
    {
        // $user = User::find($id);

        return view('pelanggan.profil.edit', [
            'user' => $user,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'image' => 'image|file'
        ]);

        // $user = User::find($id);

        $validatedData['image'] = $request->file('image')->store('user-images');


        // $user->image = $request->image;
        // $user->save();
        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/pelanggan/profil');
    }
}
