<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedagangs', function (Blueprint $table) {
            $table->unsignedinteger('user_id');
            
            $table->increments('pedagang_id');
            $table->string('nama_depan',30);
            $table->string('nama_belakang',30);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nomor_telepon',13);
            $table->string('foto_profil',255);
            $table->string('foto_ktp',255);
            $table->string('alamat',100);
            $table->longtext('deskripsi');
            $table->string('lat');
            $table->string('lon');
            $table->string('status',10);
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
        Schema::dropIfExists('pedagang');
    }
}
