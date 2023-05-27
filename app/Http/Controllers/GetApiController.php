<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Province;
use App\Models\City;

class GetApiController extends Controller
{
    public function index(Request $request)
    {

        if ($request->origin && $request->destination && $request->weight && $request->courier) {
            $origin = $request->origin;
            $destination = $request->destination;
            $weight = $request->weight;
            $courier = $request->courier;

            $response = Http::asForm()->withHeaders([
                'key' => 'eb861daccba54d4b7daab328a345648b'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier
            ]);

            $cekongkir = $response['rajaongkir']['results'][0]['costs'];
        } else {
            $origin = '';
            $destination = '';
            $weight = '';
            $courier = '';
            $cekongkir = null;
        }





        $provinsi = Province::all();
    }

    public function ajax($id)
    {
        $cities = City::where('province_id', '=', $id)->pluck('city_name', 'id');

        return json_encode($cities);
    }
}
