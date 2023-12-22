<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class HomeController extends Controller
{
    public function index(){
/*
        $dados = DB::table('vw_relatorio_autores')->get();
        $nomeArquivo = 'relatorio_autores_excel.xlsx';

        // Adiciona um cabeçalho ao array de dados
        $cabecalho = ['Nome Autor', 'Livros']; // Substitua com os nomes reais das colunas
        $dadosComCabecalho = collect([$cabecalho])->concat($dados);

        return Excel::download(new class($dadosComCabecalho) implements FromCollection {
            public function __construct($dados) {
                $this->dados = $dados;
            }

            public function collection() {
                return collect($this->dados);
            }
        }, $nomeArquivo);
return;
*/

        $data = [
                'title_pg' =>'Dashboard',
                'title_view' =>'Área Gerencial'
        ];
        return view('index', compact('data'));
    }
}
