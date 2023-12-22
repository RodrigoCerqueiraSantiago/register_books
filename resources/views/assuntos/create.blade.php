@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Novo Assunto</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('assuntos.store') }}">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}" required>
            </div>

            <!-- Adicione outros campos conforme necessário -->

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
