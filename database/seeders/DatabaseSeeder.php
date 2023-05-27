<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'type' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Toko User',
                'email' => 'toko@gmail.com',
                'type' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'type' => 0,
                'password' => bcrypt('123456'),
            ]
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
        Toko::create([
            'user_id' => 3,
            'nama_toko' => 'toko user'
        ]);

        Kategori::create([
            'nama_kategori' => 'Honda Cb',
            'tahun' => '2000'
        ]);
        Kategori::create([
            'nama_kategori' => 'Vespa',
            'tahun' => '1990'
        ]);

        Produk::create([
            'nama_produk' => 'Velg vespa',
            'kategori_id' => '2',
            'toko_id' => '1',
            'harga' => '1000000',
            'qty' => '1',
            'berat' => '2',
            'deskripsi' => 'Velg satu set Vespa Primavera Px tahun
            1990-2000 include ban depan belakang ukuran 90/90 rata.'
        ]);
        Produk::create([
            'nama_produk' => 'Velg Honda cb',
            'kategori_id' => '1',
            'toko_id' => '1',
            'harga' => '20000000',
            'qty' => '1',
            'berat' => '2',
            'deskripsi' => 'velg Jari-jari honda cb ring 17 include ban
            merk corsa ukuran 90/90 rata depan belakang'
        ]);
        Produk::create([
            'nama_produk' => 'Rangka Vespa',
            'kategori_id' => '2',
            'toko_id' => '1',
            'harga' => '3000000',
            'qty' => '1',
            'berat' => '2',
            'deskripsi' => 'Rangka vespa primavera px tahun 1993
            restorasi sudah mulus luar dalam'
        ]);
    }
}
