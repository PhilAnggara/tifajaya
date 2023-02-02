<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // /**
    //  * Run the migrations.
    //  *
    //  * @return void
    //  */
    // public function up()
    // {
    //     Schema::create('tahap_pengujian', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('id_perusahaan');
    //         $table->foreignId('id_tahap');
    //         $table->string('mulai');
    //         $table->string('selesai');
    //         $table->integer('status');
    //         $table->timestamps();
    //         $table->softDeletes();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('tahap_pengujian');
    // }
};
