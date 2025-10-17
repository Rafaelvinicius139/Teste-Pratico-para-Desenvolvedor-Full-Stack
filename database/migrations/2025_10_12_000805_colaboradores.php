<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;     // ✅ necessário para DB::table
use Illuminate\Support\Facades\Hash;   // ✅ necessário para Hash::make

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('cpf', 14)->unique();
            $table->foreignId('unidade_id')
                  ->constrained('unidades')
                  ->onDelete('cascade');
            $table->timestamps();
        });

        // ✅ Inserindo usuário padrão para login
        DB::table('colaboradores')->insert([
            'nome' => 'Administrador',
            'email' => 'admin@teste.com',
            'cpf' => '12345678900',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};

