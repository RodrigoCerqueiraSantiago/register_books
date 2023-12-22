@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="titulo_paginas">Listagem de Assuntos</h1>
            </div>
        </div>
        <div class="row  mt-4">
            <div class="col-lg-6 text-center">
                <a href="{{ route('home') }}" class="btn btn-secondary tamButtom">Voltar</a>
            </div>
            <div class="col-lg-6 text-center">
                <a href="{{ route('assuntos.create') }}" class="btn btn-success tamButtom">Novo Assunto</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                    <tbody>

                    @forelse($assuntos as $assunto)

                        <tr>
                            <td>{{ $assunto->codAs }}</td>
                            <td>{{ $assunto->Descricao }}</td>
                            <td>
                                <a href="{{ route('assuntos.edit', $assunto['codAs']) }}" class="btn btn-warning">Editar</a>

                                <!--<a href="{{ route('assuntos.edit', ['assunto' => $assunto['codAs']]) }}" class="btn btn-warning">Editar</a>-->
                                <form action="{{ route('assuntos.destroy', $assunto['codAs']) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nenhum assunto encontrado.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
    </div>

@endsection

