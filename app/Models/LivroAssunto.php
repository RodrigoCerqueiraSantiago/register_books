<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAssunto extends Model
{
    use HasFactory;

    protected $table = 'livro_assuntos';
    protected $primaryKey = 'id'; // ou a chave primária específica, se diferente de 'id'
    public $timestamps = true;

    protected $fillable = [
        'livro_id',
        'assunto_id',
    ];

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id', 'id');
    }

    public function assunto()
    {
        return $this->belongsTo(Assunto::class, 'assunto_id', 'id');
    }
}
