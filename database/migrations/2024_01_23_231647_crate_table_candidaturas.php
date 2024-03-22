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
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vaga_id');
            $table->foreign('vaga_id')
            ->references('id')->on('vagas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreignId('candidato_id');
            $table->foreign('candidato_id')
            ->references('id')->on('candidatos')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidaturas');
    }
};
