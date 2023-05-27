<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sukucadang;
use Illuminate\Support\Facades\Storage;

class AdmSukucadangController extends Controller
{
    public function index()
    {
        return view('admin.sukucadang.index', [
            'sukucadangs' => Sukucadang::all()
        ]);
    }

    public function create()
    {
        return view('admin.sukucadang.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sukucadang' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('sukucadang-images');
        }

        Sukucadang::Create($validatedData);

        return redirect('/admin/sukucadang')->with('success', 'New Kategori Sukucadang has ben added!');
    }

    public function edit(Sukucadang $sukucadang)
    {
        return view('admin.sukucadang.edit', [
            'sukucadang' => $sukucadang,
            'sukucadangs' => Sukucadang::all()
        ]);
    }

    public function update(Request $request, Sukucadang $sukucadang)
    {
        $validatedData = $request->validate([
            'nama_sukucadang' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('sukucadang-images');
        }

        Sukucadang::where('id', $sukucadang->id)
            ->update($validatedData);

        return redirect('/admin/sukucadang')->with('success', 'Kategori Sukucadang has ben Updated!');
    }

    public function destroy(Sukucadang $sukucadang)
    {
        if ($sukucadang->image) {
            Storage::delete($sukucadang->image);
        }

        Sukucadang::destroy($sukucadang->id);
        return redirect('/admin/sukucadang')->with('success', 'Kategori sukucadang has ben Deleted!');
    }
}
