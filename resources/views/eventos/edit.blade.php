@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class='edit'>Editar Evento</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $evento->nome }}" required>
                    </div>
                    <div class="form-group">
                        <label for="data">Data</label>
                        <input type="date" class="form-control" id="data" name="data" value="{{ $evento->data->format('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="local">Local</label>
                        <input type="text" class="form-control" id="local" name="local" value="{{ $evento->local }}" required>
                    </div>
                    <div class="form-group">
                        <label for="horario_inicio">Horário Início</label>
                        <input type="time" class="form-control" id="horario_inicio" name="horario_inicio" value="{{ $evento->horario_inicio }}" required>
                    </div>
                    <div class="form-group">
                        <label for="horario_fim">Horário Fim</label>
                        <input type="time" class="form-control" id="horario_fim" name="horario_fim" value="{{ $evento->horario_fim }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
