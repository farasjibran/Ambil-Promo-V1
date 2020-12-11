<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskons', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_diskon');
            $table->integer('kategori_barang');
            $table->string('title');
            $table->string('deskripsi');
            $table->date('tanggal_diskon');
            $table->date('tanggal_berakhir');
            $table->string('image');
            $table->integer('price');
            $table->string('status');
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
        Schema::dropIfExists('diskons');
    }
}
