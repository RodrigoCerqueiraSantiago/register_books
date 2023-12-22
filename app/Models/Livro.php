<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Autor;
use App\Models\Assunto;

class Livro extends Model
{
    use HasFactory;
    protected $table = 'livros';
    protected $primaryKey = 'Codl'; // Define a chave primária personalizada
    protected $fillable = ['titulo', 'preco', 'editora', 'edicao','anopublicacao'];

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autores', 'Livro_Codl', 'Autor_CodAu');
    }

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'livro_assuntos', 'Livro_Codl', 'Assunto_CodAs');
    }
}
