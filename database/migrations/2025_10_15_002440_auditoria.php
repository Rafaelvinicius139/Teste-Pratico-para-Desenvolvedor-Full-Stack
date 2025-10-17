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
    Schema::create('auditorias', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable();
        $table->string('tabela');
        $table->string('acao');
        $table->unsignedBigInteger('registro_id')->nullable();
        $table->json('dados_anteriores')->nullable();
        $table->json('dados_novos')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('colaboradors')->onDelete('set null');
    });
}

    /**
     * Reverse the migrations.
     */
   
};
