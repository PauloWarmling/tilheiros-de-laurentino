@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class='add'>Adicionar Evento</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('eventos.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class='label-edit' for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label class='label-edit' for="data">Data</label>
                        <input type="date" class="form-control" id="data" name="data" required>
                    </div>
                    <div class="form-group">
                        <label class='label-edit' for="local">Local</label>
                        <input type="text" class="form-control" id="local" name="local" required>
                    </div>
                    <div class="form-group">
                        <label class='label-edit' for="horario_inicio">Horário Início</label>
                        <input type="time" class="form-control" id="horario_inicio" name="horario_inicio" required>
                    </div>
                    <div class="form-group">
                        <label class='label-edit' for="horario_fim">Horário Fim</label>
                        <input type="time" class="form-control" id="horario_fim" name="horario_fim" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
