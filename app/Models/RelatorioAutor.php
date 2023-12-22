<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatorioAutor extends Model
{
    use HasFactory;

    protected $table = 'vw_relatorio_autores';
    public $timestamps = false;
}
