@extends('layouts.main')

@section('title', 'edição')

@section('headerTitle', 'edição de livros')

@section('content')

    @if (session('error'))
        <div id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="post" id="formCreate">
        @csrf   
        @method('put')

        <h1 id="formTitle">editar</h1>

        <div class="formContainer">
            <label for="title">Titulo: </label>
            <input type="text" name="title" class="input" value="{{ $book->title }}">
        </div>

        <div class="formContainer">
            <label for="author">Autor: </label>
            <input type="text" name="author" class="input" value="{{ $book->title }}">
        </div>

        <div class="formContainer">
            <select name="category_id">
                <option value="">selecione</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="formContainer">
            <select name="school_id">
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ $book->school_id == $school->id ? 'selected' : '' }} >{{ $school->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('books.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="atualizar" id="create">
        </div>
    </form>
    
@endsection