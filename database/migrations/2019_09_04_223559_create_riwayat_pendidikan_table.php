<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('tingkat_pendidikan');
            $table->string('nama_sekolah');
            $table->text('alamat_sekolah');
            $table->string('jurusan');
            $table->string('no_ijazah');
            $table->date('tanggal_ijazah');
            $table->text('file_ijazah');
            $table->text('file_transkip_ijazah');
            $table->text('file_sertifikat_pendidik');
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
        Schema::dropIfExists('riwayat_pendidikan');
    }
}
