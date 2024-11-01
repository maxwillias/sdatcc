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
        Schema::create('Artigos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('autor_id')->constrained('Alunos');
            $table->foreignId('orientador_id')->constrained('Orientadores');
            $table->string('titulo');
            $table->string('arquivo_nome')->nullable();
            $table->string('arquivo_path')->nullable();
            $table->date('data_publicacao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Artigos');
    }
};
