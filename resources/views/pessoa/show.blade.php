@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Detalhes da Pessoa</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $pessoa->name }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $pessoa->email }}</p>
                    <p class="card-text"><strong>Idade:</strong> {{ $pessoa->age }}</p>
                    <p class="card-text"><strong>Número:</strong> {{ $pessoa->number }}</p>
                    @if ($pessoa->photo)
                        <img src="{{ asset($pessoa->photo) }}" class="img-thumbnail" style="max-width: 200px;">
                    @else
                        <p>Nenhuma foto disponível</p>
                    @endif
                    <a href="{{ route('pessoa.edit', $pessoa->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('pessoa.destroy', $pessoa->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta pessoa?')">Excluir</button>
                    </form>
                    <a href="{{ route('pessoa.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
