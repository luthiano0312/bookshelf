@extends('layouts.main')

@section('title', 'cadastro')

@section('headerTitle', 'Cadastro de livros')

@section('content')

    @if (session('error'))
        <div id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="post" id="formCreate">
        @csrf   

        <h1 id="formTitle">Cadastrar</h1>

        <div class="formContainer">
            @error ('title')
                {{ $message }}
            @enderror
            <label for="title">Titulo: </label>
            <input type="text" name="title" class="input" value="{{ old('title') }}">
        </div>

        <div class="formContainer">
            @error ('author')
                {{ $message }}
            @enderror
            <label for="author">Autor: </label>
            <input type="text" name="author" class="input" value="{{ old('author') }}">
        </div>

        <div class="formContainer">
            @error ('category_id')
                {{ $message }}
            @enderror
            <select name="category_id">
                <option value="">selecione</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old("category_id") == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="formContainer">
            @error ('school_id')
                {{ $message }}
            @enderror
            <select name="school_id">
                <option value="">selecione</option>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ old("school_id") == $school->id ? 'selected' : '' }} >{{ $school->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('books.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="Cadastrar" id="create">
        </div>
    </form>
    
@endsection