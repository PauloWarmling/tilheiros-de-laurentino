<!-- resources/views/participacoes/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Participações</h2>
        <a href="{{ route('participacoes.create') }}" class="btn btn-primary mb-3">Nova Participação</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Pessoa</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Data de Criação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participacoes as $participacao)
                <tr>
                    <td>{{ $participacao->id }}</td>
                    <td>{{ $participacao->pessoa->name }}</td>
                    <td>{{ $participacao->evento->nome }}</td>
                    <td>{{ $participacao->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('participacoes.show', $participacao->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('participacoes.edit', $participacao->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('participacoes.destroy', $participacao->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
