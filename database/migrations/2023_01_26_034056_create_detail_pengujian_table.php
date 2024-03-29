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
        Schema::create('detail_pengujian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perusahaan');
            $table->foreignId('id_jenis_pengujian');
            $table->integer('total_harga');
            $table->string('no_surat');
            $table->string('no_material');
            $table->text('surat_perintah')->nullable();
            $table->text('laporan')->nullable();
            $table->text('surat_pengantar')->nullable();
            $table->integer('surat_perintah_download')->default(0);
            $table->integer('laporan_download')->default(0);
            $table->integer('surat_pengantar_download')->default(0);
            $table->text('surat_perintah_unapproved')->nullable();
            $table->text('laporan_unapproved')->nullable();
            $table->text('surat_pengantar_unapproved')->nullable();
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
        Schema::dropIfExists('detail_pengujian');
    }
};
