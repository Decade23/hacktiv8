<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->enum('jenis_mutasi',['pensiun','mutasi masuk','mutasi keluar','pindah antar instansi','wafat'])->default('mutasi masuk');
            $table->date('tanggal_mutasi');
            $table->text('sk_mutasi');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user_profile')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasi');
    }
}
