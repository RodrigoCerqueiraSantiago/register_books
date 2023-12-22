<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivroAssuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro_assuntos', function (Blueprint $table) {
            $table->unsignedBigInteger('livro_codl');
            $table->unsignedBigInteger('Assunto_codAs'); // Ajuste o nome da coluna conforme sua tabela
            $table->foreign('livro_codl')->references('Codl')->on('livros')->onDelete('cascade');
            $table->foreign('Assunto_codAs')->references('CodAs')->on('assuntos')->onDelete('cascade');

            $table->unique(['livro_codl', 'Assunto_codAs']);
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
        Schema::dropIfExists('livro_assuntos');
    }
}
