<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmKategoriController extends Controller
{
    public function index()
    {
        return view('admin.kategori.index', [
            'kategoris' => Kategori::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.kategori.create', [
            'motors' => Motor::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'motor_id' => 'required',
            'nama_kategori' => 'required|max:255',
            'tahun' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('kategori-images');
        }

        Kategori::Create($validatedData);

        return redirect('/admin/kategori')->with('success', 'New Kategori has ben added!');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', [
            'kategori' => $kategori,
            'kategoris' => Kategori::all(),
            'motors' => Motor::all()
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
            'motor_id' => 'required',
            'nama_kategori' => 'required',
            'tahun' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('kategori-images');
        }

        Kategori::where('id', $kategori->id)
            ->update($validatedData);

        return redirect('/admin/kategori')->with('success', 'Kategori has ben Updated!');
    }

    public function destroy(Kategori $kategori)
    {
        if ($kategori->image) {
            Storage::delete($kategori->image);
        }

        Kategori::destroy($kategori->id);
        return redirect('/admin/kategori')->with('success', 'Kategori has ben Deleted!');
    }
}
