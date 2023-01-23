<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('nama_pj');
            $table->string('jabatan_pj');
            $table->string('nama_pjsatu');
            $table->string('jabatan_pjsatu');
            $table->string('paket');
            $table->string('alamat');
            $table->string('no_sp');
            $table->string('telp');
            $table->date('tgl_sp');
            $table->date('tgl_daftar');
            $table->string('satuan_kerja');
            $table->string('token');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaan');
    }
};
