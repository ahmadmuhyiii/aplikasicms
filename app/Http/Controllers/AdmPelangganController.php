<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use Barryvdh\DomPDF\Facade\Pdf;


class AdmPelangganController extends Controller
{
    public function index()
    {
        return view('admin.pelanggan.index', [
            'user' => User::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    public function cetak_pdf()
    {
        $data = User::all();

        view()->share('data', $data);
        $pdf = Pdf::loadview('admin.pelanggan.cetak_pdf');
        return $pdf->stream('user.pdf');
    }

    // $pdf = Pdf::loadView('admin.pelanggan.index', $data);
    //     return $pdf->download('user.pdf');
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::Create($validatedData);

        return redirect('/admin/pelanggan')->with('success', 'New User has ben added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.pelanggan.edit', [
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
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required'
        ];

        if ($request->password != null) {
            $rules['password'] = 'required';
        }
        $validatedData = $request->validate($rules);

        if ($request->password != null) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        $user->update($validatedData);

        //User::where('id', $user->id)
        //  ->update($validatedData);

        return redirect('/admin/pelanggan')->with('success', 'User has ben Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/admin/pelanggan')->with('success', 'User has ben Deleted!');
    }
}
