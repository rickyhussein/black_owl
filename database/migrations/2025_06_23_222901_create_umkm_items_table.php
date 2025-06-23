<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('umkm_id')->nullable();
            $table->foreign('umkm_id')->references('id')->on('umkms')->onUpdate('cascade')->onDelete('cascade');
            $table->string('umkm_file_path')->nullable();
            $table->string('umkm_file_name')->nullable();
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
        Schema::dropIfExists('umkm_items');
    }
}
