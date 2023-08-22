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
        Schema::create('siswas', function (Blueprint $table) {
            $table->integer('nim')->unique();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('alamat');

            $table->unsignedBigInteger('id_jeniskelamin');
            $table->foreign('id_jeniskelamin')->references('id')->on('jeniskelamins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
