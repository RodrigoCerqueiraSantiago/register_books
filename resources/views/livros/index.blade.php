@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="titulo_paginas">Listagem de Livros</h1>
            </div>
        </div>
        <div class="row  mt-4">
            <div class="col-lg-6 text-center">
                <a href="{{ route('home') }}" class="btn btn-secondary tamButtom">Voltar</a>
            </div>
            <div class="col-lg-6 text-center">
                <a href="{{ route('livros.create') }}" class="btn btn-success tamButtom">Novo Livro</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                @if(count($livros) > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Livro</th>
                        <th>Editora</th>
                        <th>Edição</th>
                        <th>Autores</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($livros as $livro)
                        <tr>
                            <td>{{ $livro->Codl }}</td>
                            <td>{{ $livro->Titulo }}</td>
                            <td>{{ $livro->Editora }}</td>
                            <td>{{ $livro->Edicao }}</td>
                            <td>
                                <ul>
                                    @foreach ($livro->autores as $autor)
                                        {{ $autor->Nome }}<br>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="{{ route('livros.edit', $livro->Codl) }}" class="btn btn-warning tamButtomOpt btn-sm">Editar</a>

                                <form action="{{ route('livros.destroy', $livro->Codl) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger tamButtomOpt btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <div class="col-lg-12">
                        <p class="msg text-center">Nenhum livro encontrado.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection
