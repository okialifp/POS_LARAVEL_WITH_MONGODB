<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiBeneransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_benerans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kodebarang');
            $table->string('namabarang');
            $table->integer('stock');
            $table->integer('hargaawal');
            $table->integer('hargaakhir');
            $table->datetime('expired');
            $table->string('kategori');
            $table->string('unit');
            $table->foreign('ppn');
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
        Schema::dropIfExists('transaksi_benerans');
    }
}
