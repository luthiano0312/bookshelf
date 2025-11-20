@extends('layouts.main')

@section('title', 'cadastro')

@section('headerTitle', 'Cadastro de escolas')

@section('content')

    @if (session('error'))
        <div id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('schools.store') }}" method="post" id="formCreate">
        @csrf   

        <h1 id="formTitle">Cadastrar</h1>

        <div class="formContainer">
            <label for="name">Nome: </label>
            <input type="text" name="name" class="input">
        </div>

        <div class="formContainer">
            <label for="cnpj">CNPJ: </label>
            <input type="text" name="cnpj" class="input" id="cnpj">
        </div>
        <script>
            $('#cnpj').mask('00.000.000/0000-00');
        </script>

        <div class="formContainer">
            <label for="email">email: </label>
            <input type="text" name="email" class="input">
        </div>

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('schools.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="Cadastrar" id="create">
        </div>
    </form>
    
@endsection