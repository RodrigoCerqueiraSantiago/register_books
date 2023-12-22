<?php

namespace App\Http\Controllers\Relatorios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RelatorioAutor;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelatorioAutoresExport;

class RelatorioController extends Controller
{
    public function gerarRelatorio()
    {
        $dadosRelatorio = RelatorioAutor::all();

        return Excel::download(new RelatorioAutoresExport($dadosRelatorio), 'relatorio_autores.xlsx');
    }
}
