<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Livro;

class Autor extends Model
{
    use HasFactory;
    protected $table = 'autores';
    protected $primaryKey = 'CodAu'; // Define a chave primária personalizada
    protected $fillable = ['Nome'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_autores', 'Autor_CodAu', 'Livro_Codl');
    }


   /*public function livros()
    {
        return $this->belongsToMany(Livro::class);
    }*/
}
