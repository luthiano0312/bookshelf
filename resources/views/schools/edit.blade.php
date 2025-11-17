@extends('layouts.main')

@section('title', 'edição')

@section('headerTitle', 'edição de escolas')

@section('content')

    @if (session('error'))
        <div id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('schools.update', $school->id) }}" method="post" id="formCreate">
        @csrf 
        @method('put')

        <h1 id="formTitle">Cadastrar</h1>

        <div class="formContainer">
            <label for="name">Nome: </label>
            <input type="text" name="name" class="input"  value="{{ $school->name }}">
        </div>

        <div class="formContainer">
            <label for="cnpj">CNPJ: </label>
            <input type="text" name="cnpj" class="input"  value="{{ $school->cnpj }}">
        </div>

        <div class="formContainer">
            <label for="email">email: </label>
            <input type="text" name="email" class="input"  value="{{ $school->email }}">
        </div>

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('schools.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="atualizar" id="create">
        </div>
    </form>
    
@endsection