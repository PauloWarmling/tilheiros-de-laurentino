<!-- resources/views/participacoes/form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container">
            <h2>{{ isset($participacao) ? 'Editar Participação' : 'Nova Participação' }}</h2>
            <form action="{{ isset($participacao) ? route('participacoes.update', $participacao->id) : route('participacoes.store') }}" method="POST">
                @csrf
                @if(isset($participacao))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label class='label-edit' for="pessoa_id">Pessoa:</label>
                    <select name="pessoa_id" id="pessoa_id" class="form-control">
                        @foreach($pessoas as $pessoa)
                            <option value="{{ $pessoa->id }}" {{ isset($participacao) && $participacao->pessoa_id == $pessoa->id ? 'selected' : '' }}>{{ $pessoa->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class='label-edit' for="evento_id">Evento:</label>
                    <select name="evento_id" id="evento_id" class="form-control">
                        @foreach($eventos as $evento)
                            @php
                                $disabled = '';
                                if ($evento->data < now()) {
                                    $disabled = 'disabled';
                                }
                            @endphp
                            <option value="{{ $evento->id }}" {{ isset($participacao) && $participacao->evento_id == $evento->id ? 'selected' : '' }} {{ $disabled }}>
                                {{ $evento->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($participacao) ? 'Salvar Alterações' : 'Salvar' }}</button>
                <a href="{{ route('participacoes.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
