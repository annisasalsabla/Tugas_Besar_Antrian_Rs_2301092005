<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('annisa_antrians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('dokter_id')->nullable();
            $table->unsignedBigInteger('poli_id');
            $table->date('tanggal');
            $table->string('status');
            $table->integer('nomor');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id')->on('annisa_pasiens')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('annisa_dokters')->onDelete('cascade');
            $table->foreign('poli_id')->references('id')->on('annisa_polis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annisa_antrians');
    }
};
