<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration para criar a tabela de animais de estimação
return new class extends Migration {
    public function up() {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('especie');
            $table->string('raca')->nullable();
            $table->string('genero');
            $table->string('dono');
            $table->date('data_nascimento');
            $table->timestamps();
        });
    }
    
    public function down() {
        Schema::dropIfExists('pets');
    }
};
