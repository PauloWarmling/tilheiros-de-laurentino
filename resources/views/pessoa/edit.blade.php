@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class='edit'>Editar Pessoa</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('pessoa.update', $pessoa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class='label-edit' for="name">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $pessoa->name }}" required>
                    </div>
                    <div class="form-group">
                        <label class='label-edit' for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $pessoa->email }}" required>
                    </div>
                    <div class="form-group">
                        <label class='label-edit' for="age">Idade:</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{ $pessoa->age }}" required>
                    </div>
                    <div class="form-group">
                        <label class='label-edit' for="number">Telefone:</label>
                        <input type="phone" class="form-control" id="number" name="number" placeholder="(00) 00000-0000" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('pessoa.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
