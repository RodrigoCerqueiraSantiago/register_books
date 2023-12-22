<!-- resources/views/assuntos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Assunto</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{route('assuntos.update', ['assunto'=>$assunto->codAs])}}" >
        @csrf
        @method('PUT')

            <input type="text" name="codAs" value="{{ $assunto->codAs }}">

            <div class="form-group">
                <label for="Descricao">Descrição:</label>
                <input type="text" class="form-control" id="Descricao" name="Descricao" value="{{ $assunto->Descricao }}">
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary">Atualizar Assunto</button>
        </form>

        {{-- Back Button --}}
        <div class="row mt-3">
            <div class="col-lg-12">
                <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
