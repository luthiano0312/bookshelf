@extends('layouts.main')

@section('title', 'edição')

@section('headerTitle', 'edição de categorias')

@section('content')

    @if (session('error'))
        <div id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="post" id="formCreate">
        @csrf   
        @method('put')

        <h1 id="formTitle">editar</h1>

        <div class="formContainer">
            <label for="name">Nome: </label>
            <input type="text" name="name" class="input" value="{{ $category->name }}">
        </div>

        <div class="formContainer">
            <select name="school_id">
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ $category->school_id == $school->id ? 'selected' : '' }} >{{ $school->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('categories.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="atualizar" id="create">
        </div>
    </form>
    
@endsection