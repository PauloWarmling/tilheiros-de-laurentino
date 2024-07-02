@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Detalhes do Evento</h2>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $evento->nome }}</h5>
                        <p class="card-text"><strong>Data:</strong> {{ $evento->data->format('d/m/Y') }}</p>
                        <p class="card-text"><strong>Local:</strong> {{ $evento->local }}</p>
                        <p class="card-text"><strong>Horário Início:</strong> {{ $evento->horario_inicio }}</p>
                        <p class="card-text"><strong>Horário Fim:</strong> {{ $evento->horario_fim }}</p>
                        <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
