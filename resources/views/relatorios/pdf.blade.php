@extends('layouts.app')

@section('content')
    <thead>
    <tr>
        <th>Coluna 1</th>
        <th>Coluna 2</th>
        <!-- Adicione mais colunas conforme necessário -->
    </tr>
    </thead>
    <tbody>
    @foreach ($dados as $item)
        <tr>
            <td>{{ $item->NomeAutor }}</td>
            <td>{{ $item->LivrosDoAutor }}</td>
            <!-- Adicione mais colunas conforme necessário -->
        </tr>
    @endforeach
    </tbody>
</table>



@endsection
