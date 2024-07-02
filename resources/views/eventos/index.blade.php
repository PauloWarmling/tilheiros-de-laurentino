@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class='list'>Listagem de Eventos</h2>
                <a href="{{ route('eventos.create') }}" class="btn btn-primary mb-3">Adicionar Evento</a>
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
                            <th>Data</th>
                            <th>Local</th>
                            <th>Horário Início</th>
                            <th>Horário Fim</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventos as $evento)
                        @php
                            $dataEvento = \Carbon\Carbon::parse($evento->data);
                            $classeEventoPassado = $dataEvento->isPast() ? 'table-danger' : '';
                        @endphp
                        <tr class="{{ $classeEventoPassado }}">
                            <td>{{ $evento->id }}</td>
                            <td>{{ $evento->nome }}</td>
                            <td>{{ $evento->data->format('d/m/Y') }}</td>
                            <td>{{ $evento->local }}</td>
                            <td>{{ $evento->horario_inicio }}</td>
                            <td>{{ $evento->horario_fim }}</td>
                            <td>
                                <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este evento?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
