<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('code');
            $table->foreignId('kategori_id');
            $table->foreignId('sukucadang_id')->nullable();
            $table->foreignId('toko_id');
            $table->string('kondisi')->nullable();
            $table->string('harga');
            $table->integer('qty');
            $table->string('berat');
            $table->text('deskripsi');
            $table->string('image')->nullable();
            $table->integer('view')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('produks');
    }
}
