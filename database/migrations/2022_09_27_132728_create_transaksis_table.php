<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('toko_id');
            $table->string('produk_id');
            $table->string('nama');
            $table->string('no_telp');
            $table->string('alamat');
            $table->string('jasa_pengiriman');
            $table->string('no_resi')->nullable();
            $table->string('total_bayar');
            $table->string('status_pembayaran');
            $table->string('status_pesanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
