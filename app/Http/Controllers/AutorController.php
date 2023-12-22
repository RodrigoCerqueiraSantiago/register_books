<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::with('livros')->get();
       // $livros = $autores->livros;

        //  $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Autor::create([
            'Nome' => $request->input('nome'),
        ]);

        return redirect()->route('autores.index')->with('success', 'Autor cadastrado com sucesso!');
    }

    public function show(Autor $autore)
    {

        return view('autores.show', compact('autor'));
    }

    public function edit(Autor $autore)
    {
        $autores = Autor::with('livros')->get();
        $livrosDoAutor =$autore->livros;
        $livrosDisponiveis = Livro::all();

        return view('autores.edit', compact('autore', 'livrosDoAutor', 'livrosDisponiveis'));

    }



    //public function update(Request $request, Autor $autore)
    public function update(Request $request, $idAutor)
    {
        $autor = Autor::findOrFail($idAutor);
        $msg = "";

        // Se livros_remover foi enviado no formulário, desatacha os livros que não estão presentes
        if ($request->has('livros_remover')) {
            // Busca o autor no banco de dados pelo ID

            $livrosRemover = $request->livros_remover;
            //Desassocia os liros selecionados do autor em questão
            if($autor->livros()->detach($livrosRemover)){
                $msg = 'Livro desassociado do Autor e/ou dados atualizados com sucesso!';
            }
        } else {
            // Se livros_remover não foi enviado, detach todos os livros associados ao livro
           // Livro::->autores()->detach($livrosAssociados);
        }

        $request->validate([
            'Nome' => 'required|string|max:255',
        ]);

        $autor->update([
            'Nome' => $request->Nome,
        ]);

        $msg = 'Livro desassociado do Autor e/ou dados atualizados com sucesso!';

        return redirect()->route('autores.index')->with('success', $msg);
    }

    public function destroy(Autor $autore)
    {
        $autore->delete();
        return redirect()->route('autores.index')->with('success', 'Autor removido com sucesso!');
    }
}
