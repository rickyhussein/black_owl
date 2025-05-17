<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPengantarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pengantars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('keluarga_id')->nullable();
            $table->foreign('keluarga_id')->references('id')->on('keluargas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('surat_pengantar_number')->nullable();
            $table->date('date')->nullable();
            $table->string('born_place')->nullable();
            $table->date('born_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('nation')->nullable();
            $table->string('religion')->nullable();
            $table->string('ktp_number')->nullable();
            $table->string('married_status')->nullable();
            $table->string('job')->nullable();
            $table->text('alamat')->nullable();
            $table->string('letter_type')->nullable();
            $table->string('letter_type_text')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('surat_pengantars');
    }
}
