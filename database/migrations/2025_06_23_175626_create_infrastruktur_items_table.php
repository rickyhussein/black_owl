<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfrastrukturItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrastruktur_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('infrastruktur_id')->nullable();
            $table->foreign('infrastruktur_id')->references('id')->on('infrastrukturs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('infrastruktur_file_path')->nullable();
            $table->string('infrastruktur_file_name')->nullable();
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
        Schema::dropIfExists('infrastruktur_items');
    }
}
