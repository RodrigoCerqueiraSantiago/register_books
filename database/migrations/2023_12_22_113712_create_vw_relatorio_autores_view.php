<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVwRelatorioAutoresView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW vw_relatorio_autores AS
            SELECT
                livros.titulo,
                GROUP_CONCAT(autores.nome SEPARATOR ', ') as autores,
                GROUP_CONCAT(assuntos.Descricao SEPARATOR ', ') as assuntos
            FROM
                livros
            LEFT JOIN livro_autores ON livros.Codl = livro_autores.livro_codl
            LEFT JOIN autores ON livro_autores.Autor_CodAu = autores.CodAu
            LEFT JOIN livro_assuntos ON livros.Codl = livro_assuntos.livro_codl
            LEFT JOIN assuntos ON livro_assuntos.Assunto_codAs = assuntos.codAs
            GROUP BY livros.Codl
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vw_relatorio_autores');
    }
}
