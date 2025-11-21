@extends('layouts.main')

@section('title', 'cadastro')

@section('headerTitle', 'Cadastro de bibliotecarios')

@section('content')

    @if (session('error'))
        <div id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('librarians.store') }}" method="post" id="formCreate">
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
            @error ('email')
                {{ $message }}
            @enderror
            <label for="email">Email: </label>
            <input type="text" name="email" class="input" value="{{ old('email') }}">
        </div>

        <div class="formContainer">
            @error ('password')
                {{ $message }}
            @enderror
            <label for="password">Senha: </label>
            <input type="password" name="password" class="input" value="{{ old('password') }}">
        </div>

        <div class="formContainer">
            @error ('role')
                {{ $message }}
            @enderror
            <label for="role">Cargo: </label>
            <select name="role">
                <option value=2 {{ old("role") == 2 ? 'selected' : '' }} >gestor</option>
                <option value=3 {{ old("role") == 3 ? 'selected' : '' }} >bibliotecario</option>
            </select>
        </div>

        <div class="formContainer">
            @error ('school_id')
                {{ $message }}
            @enderror
            <select name="school_id">
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ old("school_id") == $school->id ? 'selected' : '' }} >{{ $school->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('librarians.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="Cadastrar" id="create">
        </div>
    </form>
    
@endsection