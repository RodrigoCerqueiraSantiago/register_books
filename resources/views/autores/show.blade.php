@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalhes do Autor</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nome:{{ $autor->Nome }}</h5>
                <p class="card-text">Cod: {{ $autor->CodAu }}</p>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Titulo</td>
                            <td>Editora</td>
                            <td>Preço</td>
                            <td>Publicação</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($autor->livros as $livro)
                            <tr>
                                <td>{{$livro->Titulo}}</td>
                                <td>{{$livro->Editora}}</td>
                                <td>{{$livro->preco}}</td>
                                <td>{{$livro->AnoPublicacao}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <!-- Outros detalhes do autor, se necessário -->

                <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
