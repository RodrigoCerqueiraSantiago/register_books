<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    use HasFactory;
    protected $table = 'assuntos';
    protected $primaryKey = 'CodAs'; // Define a chave primária personalizada
    protected $fillable = ['Descricao'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class);
    }
    /*public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_assuntos', 'Assunto_CodAs', 'Livro_Codl');
    }*/
}
