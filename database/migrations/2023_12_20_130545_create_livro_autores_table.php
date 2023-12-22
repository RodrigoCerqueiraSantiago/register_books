<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivroAutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro_autores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Livro_Codl')->constrained('livros', 'Codl');
            $table->foreignId('Autor_CodAu')->constrained('autores', 'CodAu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livro_autores');
    }
}
