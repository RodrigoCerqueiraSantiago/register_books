<?php

namespace App\Http\Controllers;

use App\Models\Assunto;
use Illuminate\Http\Request;

class AssuntoController extends Controller
{

    public function index()
    {
        $assuntos = Assunto::all();
        return view('assuntos.index', compact('assuntos'));
    }

    public function create()
    {
        return view('assuntos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|unique:assuntos|max:255',
        ]);

        Assunto::create([
            'Descricao' => $request->descricao,
        ]);

        return redirect()->route('assuntos.index')
            ->with('success', 'Assunto criado com sucesso.');
    }

    public function edit(Assunto $assunto)
    {
        return view('assuntos.edit', compact('assunto'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'Descricao' => 'required|max:255',
        ]);

        $assunto = Assunto::find($request->codAs);

        $assunto->update($request->all());

        return redirect()->route('assuntos.index')->with('success', 'Assunto atualizado com sucesso.');
    }

    public function destroy(Assunto $assunto)
    {
        $assunto->delete();

        return redirect()->route('assuntos.index')
            ->with('success', 'Assunto excluído com sucesso.');
    }
}
