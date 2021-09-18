<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absensi', function (Blueprint $table) {
            //
            $table->float('longtd_masuk')->after('jam_pulang')->nullable();
            $table->float('latd_masuk')->after('longtd_masuk')->nullable();
            $table->float('longtd_pulang')->after('latd_masuk')->nullable();
            $table->float('latd_pulang')->after('longtd_pulang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensi', function (Blueprint $table) {
            //
            $table->dropColumn('longtd_masuk');
            $table->dropColumn('latd_masuk');
            $table->dropColumn('longtd_pulang');
            $table->dropColumn('latd_pulang');
        });
    }
}
