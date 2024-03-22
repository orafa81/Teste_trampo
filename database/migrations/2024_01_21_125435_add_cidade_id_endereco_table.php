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
         Schema::table('enderecos', function (Blueprint $table) {
             $table->foreignId('cidade_id')
             ->constrained('cidades', 'id')
             ->cascadeOnUpdate()
             ->cascadeOnDelete();
         });
     }
 
     /**
      * Reverse the migrations.
      *
     
      */
     public function down()
     {
         Schema::table('enderecos', function (Blueprint $table) {
             $table->dropColumn('cidade_id');
         });
     }
};
