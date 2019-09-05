<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->enum('jabatan',['kepala sekolah','tu','waket kurikulum','kesiswaan','humas','sarana prasarana']);
            $table->string('golongan');
            $table->string('tmt_jabatan');
            $table->text('sk_file_jabatan');
            
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
        Schema::dropIfExists('jabatan');
    }
}
