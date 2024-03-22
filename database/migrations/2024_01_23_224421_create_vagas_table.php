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
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('empresa_id');
            $table->foreign('empresa_id')
            ->references('id')->on('empresas')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            
            $table->string('titulo');
            $table->string('hierarquia');
            $table->string('salario');
            $table->text('descricao')->nullable();
            $table->text('beneficio')->nullable();
            $table->string('area');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagas');
    }
};
