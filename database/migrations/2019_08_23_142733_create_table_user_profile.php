<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nip');
            $table->string('nama',50);
            $table->string('tempat_lahir', 35);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin',15);
            $table->integer('jabatan_id');
            $table->integer('no_ktp');
            $table->text('alamat');
            $table->Integer('status_kawin_id');
            $table->string('status_kepegawaian', 20);
            $table->string('email', 50);
            $table->string('no_telepon', 20);
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
        Schema::dropIfExists('users_profile');
    }
}
