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
        Schema::create('TCCs', function (Blueprint $table) {
            $table->id();
            $table->string('aluno');
            $table->string('orientador');
            $table->string('titulo');
            $table->string('arquivo_nome')->nullable();
            $table->string('arquivo_path')->nullable();
            $table->text('resumo')->nullable();
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
        Schema::dropIfExists('TCCs');
    }
};
