<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNewToKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keluargas', function (Blueprint $table) {
            $table->string('born_place')->nullable();
            $table->date('born_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('nation')->nullable();
            $table->string('religion')->nullable();
            $table->string('ktp_number')->nullable();
            $table->string('married_status')->nullable();
            $table->string('job')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keluargas', function (Blueprint $table) {
            //
        });
    }
}
