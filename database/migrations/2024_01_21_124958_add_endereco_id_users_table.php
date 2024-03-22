<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('endereco_id')->nullable();
            $table->foreign('endereco_id')
            ->references('id')->on('enderecos')
            ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('endereco_id');
        });
    }
};
