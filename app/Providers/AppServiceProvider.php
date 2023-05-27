<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Province;
use App\Models\Transaksi;
use App\Models\City;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        Transaksi::all();


        // Using view composer to set following variables globally

        view()->composer('*', function ($view) {

            $trans = Transaksi::all();
            // $trans = Transaksi::where('toko_id', $user->toko->id)->count();
            // if ($user->toko) {
            //     $trans = Transaksi::where('toko_id', $user->toko->id)->count();
            // } else {
            //     $trans = 'Anda tidak memiliki toko';
            // }
            $provinsi = Province::all();
            $city = City::all();
            // $chats = Message::all();
            //     $request = new Request;
            //     if ($request->origin && $request->destination && $request->weight && $request->courier) {
            //         $origin = $request->origin;
            //         $destination = $request->destination;
            //         $weight = $request->weight;
            //         $courier = $request->courier;

            //         $response = Http::asForm()->withHeaders([
            //             'key' => 'eb861daccba54d4b7daab328a345648b'
            //         ])->post('https://api.rajaongkir.com/starter/cost', [
            //             'origin' => $origin,
            //             'destination' => $destination,
            //             'weight' => $weight,
            //             'courier' => $courier
            //         ]);

            //         $cekongkir = $response['rajaongkir']['results'][0]['costs'];
            //     } else {
            //         $origin = '';
            //         $destination = '';
            //         $weight = '';
            //         $courier = '';
            //         $cekongkir = null;
            //     }



            //     $provinsi = Province::all();
            $view->with(['trans' => $trans, 'provinsi' => $provinsi, 'city' => $city]);
        });
    }
}
