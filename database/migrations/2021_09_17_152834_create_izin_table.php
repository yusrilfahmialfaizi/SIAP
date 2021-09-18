<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izin', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nik', 16);
            $table->enum('jenis_tidakhadir', ['Izin Sakit', 'Izin Bepergian', 'Cuti']);
            $table->string('gambar')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::table('izin', function (Blueprint $table) {
            $table->foreign('nik')
                ->references('nik')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('izin');

        Schema::table('izin', function (Blueprint $table) {
            $table->dropForeign(['nik']);
        });
    }
}
