@extends('layouts.main')

@section('title', 'cadastro')

@section('headerTitle', 'Cadastro de emprestimos')

@section('content')

    @if (session('error'))
        <div id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('loans.store') }}" method="post" id="formCreate">
        @csrf   

        <h1 id="formTitle">Cadastrar</h1>

        <div class="formContainer">
            <label for="StudentName">Nome do estudante: </label>
            <input type="text" name="StudentName" class="input">
        </div>

        <div class="formContainer">
            <label for="book_id">ID do livro: </label>
            <input type="number" name="book_id" class="input">
        </div>

        <div class="formContainer">
            <label for="returnDate">Data de devolução: </label>
            <input type="date" name="returnDate" class="input">
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
                <a href="{{ route('loans.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="Cadastrar" id="create">
        </div>
    </form>
    
@endsection