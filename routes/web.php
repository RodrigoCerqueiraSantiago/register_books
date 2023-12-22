<?php

use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/exportar-excel', function () {

    $dados = DB::table('vw_relatorio_autores')->get();
    $nomeArquivo = 'relatorio_autores_excel.xlsx';

    return Excel::download(new class($dados) implements FromCollection,WithHeadings {
        private $dados;

        public function __construct($dados) {
            $this->dados = $dados;
        }

        public function collection() {
            return collect($this->dados);
        }

        public function headings(): array {
            // Cabeçalho Excel
            return [
                'Livro',
                'Autor',
                'Assuntos',
            ];
        }
    }, $nomeArquivo);
})->name('exportar.excel');

Route::get('/', [HomeController::class,'index'])->name('home');

Route::resource('autores', AutorController::class);
Route::resource('livros', LivroController::class);
Route::resource('assuntos', AssuntoController::class);


/*
Route::get('/autores/create', [AutorController::class, 'create'])->name('autores.create');
Route::post('/autores', [AutorController::class, 'store'])->name('autores.store');
Route::get('/autores/{autore}/edit', [AutorController::class, 'edit'])->name('autores.edit');
*/

// Rotas para livros
/*Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');
Route::get('/livros/create', [LivroController::class, 'create'])->name('livros.create');
Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');
Route::get('/livros/{livro}', [LivroController::class, 'show'])->name('livros.show');
Route::get('/livros/{livro}/edit', [LivroController::class, 'edit'])->name('livros.edit');
Route::put('/livros/{livro}', [LivroController::class, 'update'])->name('livros.update');
Route::delete('/livros/{livro}', [LivroController::class, 'destroy'])->name('livros.destroy');
Route::get('autores/{autore}/edit', [AutorController::class, 'edit'])->name('autores.edit');
//Route::get('/autores/{autor}/edit', [AutorController::class,'edit'])->name('autores.edit');
Route::put('/autores/{autor}', [AutorController::class, 'update'])->name('autores.update');*/
/*
Route::get('/autores', [AutorController::class, 'index'])->name('assuntos.index');
Route::get('/autores/create', [AutorController::class, 'create'])->name('assuntos.create');
Route::post('/autores', [AutorController::class, 'store'])->name('autores.store');
Route::get('/autores/{autor}', [AutorController::class, 'show'])->name('autores.show');
Route::get('/autores/{autor}/edit', [AutorController::class,'edit'])->name('autores.edit');
Route::put('/autores/{autor}', [AutorController::class, 'update'])->name('autores.update');
Route::delete('/autores/{autor}', [AutorController::class, 'destroy'])->name('autores.destroy');
*/
// Rotas para assuntos

/*
Route::get('/assuntos', [AssuntoController::class, 'index'])->name('assuntos.index');
Route::get('/assuntos/create', [AssuntoController::class, 'create'])->name('assuntos.create');
Route::post('/assuntos', [AssuntoController::class, 'store'])->name('assuntos.store');
//Route::get('/assuntos/{assunto}', [AssuntoController::class, 'show'])->name('assuntos.show');
Route::get('/assuntos/{assunto}/edit', [AssuntoController::class,'edit'])->name('assuntos.edit');
Route::put('/assuntos/{assunto}', [AutorController::class, 'update'])->name('assuntos.update');
Route::delete('/assuntos/{assunto}', [AssuntoController::class, 'destroy'])->name('assuntos.destroy');
*/






