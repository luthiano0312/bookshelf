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
            <label for="title">Titulo: </label>
            <input type="text" name="title" class="input">
        </div>

        <div class="formContainer">
            <label for="author">Autor: </label>
            <input type="text" name="author" class="input">
        </div>

        <div class="formContainer">
            <select name="category_id">
                <option value="">selecione</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="formContainer">
            <select name="school_id">
                <option value="">selecione</option>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
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