@extends('layouts.main')

@section('title', 'edição')

@section('headerTitle', 'edição de usuarios')

@section('content')

    @if (session('error'))
        <div id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="post" id="formCreate">
        @csrf   
        @method('put')

        <h1 id="formTitle">editar</h1>

        <div class="formContainer">
            <label for="name">Nome: </label>
            <input type="text" name="name" class="input" value="{{ $user->name }}">
        </div>

        <div class="formContainer">
            <label for="email">Email: </label>
            <input type="text" name="email" class="input" value="{{ $user->email }}">
        </div>

        <div class="formContainer">
            <label for="role">Nivel: </label>
            <input type="number" name="role" class="input" value="{{ $user->role }}">
        </div>

        <div class="formContainer">
            <select name="school_id">
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ $user->school_id == $school->id ? 'selected' : '' }} >{{ $school->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('users.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="atualizar" id="create">
        </div>
    </form>
    
@endsection