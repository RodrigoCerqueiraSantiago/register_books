<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Autor;
use App\Models\Assunto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all()->sortByDesc('created_at');
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.create', compact('autores', 'assuntos'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'titulo' => 'required|string|max:255',
                'preco'  => 'required',
                'editora' => 'required',
                'edicao' => 'required',
                'anopublicacao' => 'required|integer|min:1000|max:9999',
            ]);

            $livro = Livro::create($request->all());

            if ($livro) {
                $livro->autores()->attach($request->autores); //Associando na N:N
                return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
                //return redirect()->route('livros.show', $livro->id);
            } else {
                return redirect()->route('livros.index')->with('error', 'Erro ao cadastrar livro!');
            }

        } catch (QueryException $e) {
            // Se ocorrer algum erro relacionado ao banco de dados
            return redirect()->route('livros.index')->with('error', 'Erro no banco de dados ao cadastrar livro.');
        } catch (\Exception $e) {
            // Outras exceções
            return redirect()->route('livros.index')->with('error', 'Erro ao cadastrar livro.');
        }
    }

    public function edit($livro)
    {
        $livro = Livro::with('autores')->findOrFail($livro);
        $autoresDoLivro = $livro->autores;

        return view('livros.edit', compact('livro','autoresDoLivro'));
    }

    public function update(Request $request, $livro)
    {
        // Validação dos dados recebidos do formulário
        $request->validate([
            'Titulo' => 'required|string',
            'Editora' => 'required|string',
            'Edicao' => 'required|string',
            'AnoPublicacao' => 'required',
        ]);

        $livro = Livro::find($livro);
        // Desassocia todos os autores do livro
        $livro->autores()->detach();

        // Associa apenas os autores selecionados (presentes em livros_remover)
        if ($autoresRemover = $request->input('livros_remover')) {
            //dd($autoresRemover);
            $livro->autores()->attach($autoresRemover);
        }
        try {
            if($livro){

                $livroUpdate = $livro->update([
                    'titulo' => $request->Titulo,
                    'editora' => $request->Editora,
                    'edicao' => $request->Edicao,
                    'anopublicacao' => $request->AnoPublicacao,
                ]);

                // Checa booleano indicando se a atualização foi bem-sucedida
                if ($livroUpdate) {
                    // Sucesso no Update
                    return redirect()->route('livros.index', ['livro' => $request->Codl])
                        ->with('success', 'Livro atualizado com sucesso!');
                } else {
                    // Nenhuma alteração realizada
                    return redirect()->route('livros.index', ['livro' => $request->Codl])
                        ->with('info', 'Nenhuma alteração realizada no livro.');
                }
            } else {
                return redirect()->route('livros.index')->with('error', 'Livro não encontrado.');
            }
        } catch (ModelNotFoundException $e) {
            // Não localizou o livro
            return redirect()->route('livros.index')->with('error', 'Livro não encontrado.');
        } catch (QueryException $e) {
            // Erro relacionado ao DB
            return redirect()->route('livros.index')->with('error', 'Encontramos um problema de banco ao atualizar o livro.');
        }
    }

    public function destroy($livroId)
    {
        try {
            // Encontra o livro pelo ID
            $livro = Livro::findOrFail($livroId);
            // Desassocia os autores do livro
            $livro->autores()->detach();
            // Excluindo o livro
            $livro->delete();

            // Redireciona de volta à página index
            return redirect()->route('livros.index')
                ->with('success', 'Livro excluído com sucesso!');
        } catch (\Exception $e) {
            // Ocorreu algum erro
            return redirect()->route('livros.index')
                ->with('error', 'Erro ao excluir o livro.');
        }
    }
}
