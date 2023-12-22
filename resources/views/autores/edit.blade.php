@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Autor</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('autores.update', ['autor' => $autore]) }}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="CodAu" value="{{$autore->CodAu}}">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Autor</label>
                <input type="text" class="form-control" id="Nome" name="Nome" value="{{ $autore->Nome }}" required>
            </div>

            <div class="form-group">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <td><b>Excluir</b></td>
                            <td><b>Livros do Autor</b></td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($livrosDoAutor as $livro)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="livros_remover[]" value="{{ $livro->Codl }}" id="livro_{{ $livro->Codl }}" >
                            </td>
                            <td>
                                <label for="livro_{{ $livro->Codl }}" >{{ $livro->Titulo }}</label>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            {{-- Botão de Voltar --}}
            <div class="row mt-3 text-center">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary tamButtom">Atualizar</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary tamButtom">Voltar</a>
                </div>
            </div>


        </form>


    </div>
@endsection
