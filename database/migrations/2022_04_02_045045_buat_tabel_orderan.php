<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelOrderan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('total')->nullable();
            $table->dateTime('tanggal')->nullable();
            $table->string('no_transaksi')->nullable();
            $table->enum('status',['masuk','diproses', 'dikirim', 'diantar', 'selesai', 'batal'])->default('masuk');
            $table->integer('total_harga')->nullable();
            $table->integer('jumlah')->nullable();
            $table->unsignedBigInteger('dibuat_oleh_id')->nullable();
            $table->foreign('dibuat_oleh_id')->references('id')->on('users');

            $table->unsignedBigInteger('depot_id')->nullable();
            $table->foreign('depot_id')->references('id')->on('users');

            $table->unsignedBigInteger('diproses_oleh_id')->nullable();
            $table->foreign('diproses_oleh_id')->references('id')->on('users');

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
        Schema::dropIfExists('pesanan');
    }
}
