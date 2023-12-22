@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="titulo_paginas">Listagem de Autores</h1>
            </div>
        </div>
        <div class="row mt-4 text-center">
            <div class="col-lg-6">
                <a href="{{ route('home') }}" class="btn btn-secondary tamButtom">Voltar</a>
            </div>
            <div class="col-lg-6">
                <a href="{{ route('autores.create') }}" class="btn btn-success tamButtom">Novo Autor</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Livros</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($autores as $autor)

                <tr>
                    <td>{{ $autor->CodAu }}</td>
                    <td>{{ $autor->Nome }}</td>
                    <td>
                        <ul>
                            @forelse($autor->livros as $livro)
                                {{ $livro->Titulo }}<br>
                            @empty
                                <h6 class="text-danger">Nenhum livro associado a este autor.</h6>
                            @endforelse
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('autores.show', $autor->CodAu) }}" class="btn btn-info">Detalhes</a>
                        <a href="{{ route('autores.edit', $autor->CodAu) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('autores.destroy', $autor->CodAu) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr class="bg-danger">
                    <td colspan="3">Nenhum autor encontrado.</td>
                </tr>
            @endforelse
            </tbody>
        </table>


    </div>

@endsection
