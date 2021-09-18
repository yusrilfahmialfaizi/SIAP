<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToIzinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('izin', function (Blueprint $table) {
            //
            $table->enum('status', ['Diajukan', 'Diterima', 'Ditolak'])->after('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('izin', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
