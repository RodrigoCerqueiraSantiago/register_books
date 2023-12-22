<!-- resources/views/assuntos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Livro</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('livros.update', ['livro' => $livro->Codl]) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="Codl" value="{{ $livro->Codl }}">

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="Titulo" value="{{ $livro->Titulo }}">
            </div>

            <div class="form-group">
                <label for="editora">Editora:</label>
                <input type="text" class="form-control" id="editora" name="Editora" value="{{ $livro->Editora }}">
            </div>
            <div class="form-group">
                <label for="edicao">Edição:</label>
                <input type="text" class="form-control" id="Edicao" name="Edicao" value="{{ $livro->Edicao }}">
            </div>
            <div class="form-group">
                <label for="anopublicacao">AnoPublicacao:</label>
                <input type="text" class="form-control" id="AnoPublicacao" name="AnoPublicacao" value="{{ $livro->AnoPublicacao }}">
            </div>

            <div class="form-group mt-2">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <td><b>Excluir</b></td>
                        <td><b>Autor(es) do Livro</b></td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($autoresDoLivro as $autor)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="livros_remover[]" value="{{ $autor->CodAu }}" id="livro_{{ $autor->Nome }}" checked>
                            </td>
                            <td>
                                <label for="livro_{{$autor->CodAu}}" >{{ $autor->Nome }}</label>
                            </td>
                        </tr>
                    @endforeach

                    @if($autoresDoLivro->isEmpty())
                        <tr class="border-danger">
                            <td class="text-danger text-center fw-bold" colspan="2">Sem autor informado</td>
                        </tr>
                    @endif


                    </tbody>
                </table>

            </div>

            <!-- Adicione outros campos conforme necessário -->

            <div class="row mt-3 text-center">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary tamButtom">Atualizar</button>
                    <a href="{{ route('livros.index') }}" class="btn btn-secondary tamButtom">Voltar</a>
                </div>
            </div>
        </form>


    </div>


@endsection
