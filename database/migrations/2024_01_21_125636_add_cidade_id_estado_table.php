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
        Schema::table('cidades', function (Blueprint $table) {
            $table->foreignId('estado_id')
                ->constrained('estados', 'id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cidades', function (Blueprint $table) {
            $table->dropColumn('estado_id');
        });
    }
};
