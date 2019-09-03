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
            $table->string('nip');
            $table->string('ktp');
            $table->string('nama',50);
            $table->string('tempat_lahir', 35);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin',15);
            $table->string('no_telepon', 20);
            $table->text('alamat');
            $table->string('status_kawin');
            $table->string('status_kepegawaian', 20);
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
