@extends('layouts.main')

@section('title', 'cadastro')

@section('headerTitle', 'Cadastro de escolas')

@section('content')

    <form action="{{ route('schools.store') }}" method="post" id="formCreate">
        @csrf   

        <h1 id="formTitle">Cadastrar</h1>

        <div class="formContainer">
            @error ('name')
                {{ $message }}
            @enderror
            <label for="name">Nome: </label>
            <input type="text" name="name" class="input" value="{{ old('name') }}">
        </div>

        <div class="formContainer">
            @error ('cnpj')
                {{ $message }}
            @enderror
            <label for="cnpj">CNPJ: </label>
            <input type="text" name="cnpj" class="input" id="cnpj" value="{{ old('cnpj') }}">
        </div>
        <script>
            $('#cnpj').mask('00.000.000/0000-00');
        </script>

        <div class="formContainer">
            @error ('email')
                {{ $message }}
            @enderror
            <label for="email">email: </label>
            <input type="text" name="email" class="input" value="{{ old('email') }}">
        </div>

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('schools.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="Cadastrar" id="create">
        </div>
    </form>
    
@endsection