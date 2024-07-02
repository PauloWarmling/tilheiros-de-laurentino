@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class='add'>Adicionar Pessoa</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('pessoa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class='label-edit' for="name">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label class='label-edit' for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class='label-edit' for="age">Idade:</label>
                        <input type="number" class="form-control" id="age" name="age" required>
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
