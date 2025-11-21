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
            @error ('title')
                {{ $message }}
            @enderror
            <label for="title">Titulo: </label>
            <input type="text" name="title" class="input" value="{{ $book->title }}">
        </div>

        <div class="formContainer">
            @error ('author')
                {{ $message }}
            @enderror
            <label for="author">Autor: </label>
            <input type="text" name="author" class="input" value="{{ $book->author }}">
        </div>

        <div class="formContainer">
            @error ('category_id')
                {{ $message }}
            @enderror
            <select name="category_id">
                <option value="">selecione</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
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
                <a href="{{ route('books.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="atualizar" id="create">
        </div>
    </form>
    
@endsection