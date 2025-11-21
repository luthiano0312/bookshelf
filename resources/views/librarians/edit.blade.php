@extends('layouts.main')

@section('title', 'edição')

@section('headerTitle', 'edição de bibliotecarios')

@section('content')

    <!-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif -->

    <form action="{{ route('librarians.update', $librarian->id) }}" method="post" id="formCreate">
        @csrf   
        @method('put')

        <h1 id="formTitle">editar</h1>

        <div class="formContainer">
            @error ('name')
                {{ $message }}
            @enderror
            <label for="name">Nome: </label>
            <input type="text" name="name" class="input" value="{{ $librarian->name }}">
        </div>

        <div class="formContainer">
            @error ('email')
                {{ $message }}
            @enderror
            <label for="email">Email: </label>
            <input type="text" name="email" class="input" value="{{ $librarian->email }}">
        </div>

        <div class="formContainer">
            @error ('role')
                {{ $message }}
            @enderror
            <label for="role">Nivel: </label>
            <select name="role">
                <option value=1 {{ $librarian->role == 1 ? 'selected' : '' }} >admin</option>
                <option value=2 {{ $librarian->role == 2 ? 'selected' : '' }} >gestor</option>
                <option value=3 {{ $librarian->role == 3 ? 'selected' : '' }} >bibliotecario</option>
            </select>
        </div>

        @if(auth()->user()->role == 1)
            <div class="formContainer">
                @error ('school_id')
                    {{ $message }}
                @enderror
                <select name="school_id">
                    <option value="">selecione</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}" >{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('librarians.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="atualizar" id="create">
        </div>
    </form>
    
@endsection