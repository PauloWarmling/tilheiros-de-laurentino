<!-- resources/views/participacoes/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <h2 class='edit'>Detalhes da Participação</h2>
        <div>
            <p><strong>ID:</strong> {{ $participacao->id }}</p>
            <p><strong>Pessoa:</strong> {{ $participacao->pessoa->name }}</p>
            <p><strong>Evento:</strong> {{ $participacao->evento->nome }}</p>
            <p><strong>Data de Criação:</strong> {{ $participacao->created_at->format('d/m/Y H:i:s') }}</p>
        </div>
        <a href="{{ route('participacoes.index') }}" class="btn btn-primary">Voltar</a>
    </div>
</div>
@endsection
