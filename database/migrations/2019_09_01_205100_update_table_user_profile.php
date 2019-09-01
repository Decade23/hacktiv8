<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profile', function(Blueprint $table) {
            $table->dropColumn(['no_ktp', 'email' ,'jabatan_id', 'status_kawin_id']);
            $table->string('status_kawin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_profile', function(Blueprint $table) {
            $table->Integer('status_kawin_id');
            $table->integer('jabatan_id');
            $table->string('email', 50);
            $table->integer('no_ktp');
            $table->dropColumn('status_kawin');
        });
    }
}
