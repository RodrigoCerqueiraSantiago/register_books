<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAutor extends Model
{
    use HasFactory;

    protected $table = 'livro_autores';
    protected $primaryKey = 'id';
    public $timestamps = false; // Se a tabela não tiver colunas created_at e updated_at

    protected $fillable = ['Livro_Codl', 'Autor_CodAu'];

    public function livros()
    {
        return $this->belongsTo(Livro::class, 'Livro_Codl', 'Codl');
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'Autor_CodAu', 'CodAu');
    }
}
