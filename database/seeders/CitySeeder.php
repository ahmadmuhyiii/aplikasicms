<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => 'eb861daccba54d4b7daab328a345648b'
        ])->get('https://api.rajaongkir.com/starter/city');

        $citys = $response['rajaongkir']['results'];

        foreach ($citys as $city) {
            $data_city[] = [
                'id' => $city['city_id'],
                'province_id' => $city['province_id'],
                'type' => $city['type'],
                'city_name' => $city['city_name'],
                'postal_code' => $city['postal_code'],
            ];
        }

        City::insert($data_city);
    }
}
