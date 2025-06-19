<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('kriteria', function (Blueprint $table) {
        $table->id();
        $table->string('kode')->unique(); // TF, RN, WA, dll
        $table->string('nama');
        $table->float('bobot')->nullable(); // hasil dari AHP
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
        Schema::dropIfExists('kriteria');
    }
};