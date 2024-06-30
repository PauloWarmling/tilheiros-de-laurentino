@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Listagem de Pessoas</h2>
            <a href="{{ route('pessoa.create') }}" class="btn btn-primary mb-3">Adicionar Pessoa</a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Idade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pessoa as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->age }}</td>
                        <td>
                            <a href="{{ route('pessoa.show', $value->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                            <a href="{{ route('pessoa.edit', $value->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('pessoa.destroy', $value->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta pessoa?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
