<!-- resources/views/livros/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Criar Livro</h2>


        <form method="post" action="{{ route('livros.store') }}">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço:</label>
                <input type="text" class="form-control" id="preco" name="preco" required>
            </div>
            <div class="mb-3">
                <label for="editora" class="form-label">Editora:</label>
                <input type="text" class="form-control" id="editora" name="editora" required>
            </div>
            <div class="mb-3">
                <label for="edicao" class="form-label">Edição:</label>
                <input type="text" class="form-control" id="edicao" name="edicao" required>
            </div>
            <!--<div class="mb-3">
                <label for="autor_id" class="form-label">Autor:</label>
                <select class="form-select" id="autor_id" name="autor_id" required>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->CodAu }}">{{ $autor->Nome }}</option>
                    @endforeach
                </select>
            </div>-->
            <div class="mb-3">
            <label for="autores" class="form-label">Autores:</label>
            <select class="form-select"  name="autores[]" multiple>
                @foreach ($autores as $autor)
                    <option value="{{ $autor->CodAu }}">{{ $autor->Nome }}</option>
                @endforeach
            </select>
            </div>

            <div class="mb-3">
                <label for="assuntos" class="form-label">Assuntos:</label>
                <select class="form-select" id="assuntos" name="assuntos" required>
                    <option></option>
                    @foreach($assuntos as $assunto)
                        <option value="{{ $assunto->CodAs }}">{{ $assunto->Descricao }}</option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label for="anopublicacao" class="form-label">Ano Publicação:</label>
                <input type="text" class="form-control" id="anopublicacao" name="anopublicacao" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    {{-- Botão de Voltar --}}
    <div class="row mt-3">
        <div class="col-lg-12">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection
