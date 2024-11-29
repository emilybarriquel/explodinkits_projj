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
        Schema::create('personagens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->unsignedBigInteger('habilidade_id');
            $table->unsignedBigInteger('classe_id');
            
            $table->foreign('habilidade_id')->references('id')->on('habilidades');
            $table->foreign('classe_id')->references('id')->on('classes');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personagens');
    }
};
