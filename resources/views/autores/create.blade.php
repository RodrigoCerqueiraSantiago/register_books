@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Novo Autor</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('autores.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Autor</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="row mt-4 text-center">
                <div class="col-lg-6">
                    <a href="{{ route('home') }}" class="btn btn-secondary tamButtom">Voltar</a>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary tamButtom">Salvar</button>
                </div>


            </div>

        </form>


    </div>
@endsection
