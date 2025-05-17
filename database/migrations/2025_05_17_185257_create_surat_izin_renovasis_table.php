<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratIzinRenovasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_izin_renovasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('type')->nullable();
            $table->string('type_text')->nullable();
            $table->bigInteger('size')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('contractor')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_phone')->nullable();
            $table->integer('fotokopi_ktp_pemohon')->nullable();
            $table->integer('gambar_design_renovasi')->nullable();
            $table->integer('surat_persetujuan_tetangga_terdekat')->nullable();
            $table->integer('dokumen_lainnya')->nullable();
            $table->string('dokumen_text')->nullable();
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
        Schema::dropIfExists('surat_izin_renovasis');
    }
}
