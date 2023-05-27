<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use Illuminate\Support\Facades\Storage;

class AdmMotorController extends Controller
{
    public function index()
    {
        return view('admin.admmotor.index', [
            'motors' => Motor::all(),
        ]);
    }

    public function create()
    {
        return view('admin.admmotor.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_merk' => 'required|max:255',
            'image' => 'image|file|max:1024'

        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('kategori-images');
        }
        Motor::Create($validatedData);

        return redirect('/admin/admmotor')->with('success', 'New Merk has ben added!');
    }

    public function edit(Motor $motor)
    {
        return view('admin.admmotor.edit', [
            'motor' => $motor,
            'motors' => Motor::all()
        ]);
    }

    public function update(Request $request, Motor $motor)
    {
        $validatedData = $request->validate([
            'nama_merk' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('motor-images');
        }

        Motor::where('id', $motor->id)
            ->update($validatedData);

        return redirect('/admin/admmotor')->with('success', 'Kategori has ben Updated!');
    }

    public function destroy(Motor $motor)
    {
        if ($motor->image) {
            Storage::delete($motor->image);
        }
        Motor::destroy($motor->id);

        return redirect('/admin/admmotor')->with('success', 'Motor has ben Deleted!');
    }
}
