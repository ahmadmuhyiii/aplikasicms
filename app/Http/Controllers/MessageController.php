<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use MessageFormatter;

class MessageController extends Controller
{
    public function index()
    {
        $froms = Message::select(['from', 'to'])
            ->groupBy(['from', 'to'])
            ->groupBy(['to', 'from'])
            ->get();
        $tos = Message::select('to')
            ->groupBy('to')
            ->get();
        $messages = Message::select('message')
            ->groupBy('message')
            ->get();


        return view(
            'pelanggan.chat.index',
            [
                'messages' => Message::where('from', auth()->user()->id)->get()
            ],
            compact('froms', 'tos', 'messages')
        );
    }
    public function create()
    {


        return view('pelanggan.chat.create', [
            'produks' => Produk::all(),
            'messages' => Message::all(),
            'tokos' => Toko::all(),
            'users' => User::all()
        ]);
    }

    public function store(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'message' => 'required',
        ]);

        $message = new Message;
        $message->from = $request->from;
        $message->to = $request->to;
        $message->message = $request->message;
        $message->link = $request->link;


        $message->save();
        // Message::Create($validatedData);

        return redirect()->route('chat.show', $request->to);
    }

    public function show($id, Produk $produk)
    {
        // $idProduk = Message::whereIn('id', $idProduk)->groupBy('$id')->pluck('to');
        // $produks = Produk::select("*")
        //     ->whereIn("id", [Produk::id(), $id])->get();
        // $produk = Produk::pluck('id');
        // foreach ($produk as $getId) {
        //     $getId = Produk::find($id);
        // }
        // $produk = Produk::find($id);

        $getChat = Message::select("*")
            ->whereIn("from", [Auth::id(), $id])
            ->whereIn("to", [Auth::id(), $id])
            ->get();
        return view('pelanggan.chat.show',  compact("getChat", 'id', 'produk',));
    }
}
