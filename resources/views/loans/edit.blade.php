@extends('layouts.main')

@section('title', 'edição')

@section('headerTitle', 'edição de emprestimos')

@section('content')

    @if (session('error'))
        <div id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('loans.update', $loan->id) }}" method="post" id="formCreate">
        @csrf   
        @method('put')

        <h1 id="formTitle">editar</h1>

        <div class="formContainer">
            <label for="StudentName">Nome do estudante: </label>
            <input type="text" name="StudentName" class="input" value="{{ $loan->studentName }}">
        </div>

        <div class="formContainer">
            <label for="book_id">ID do livro: </label>
            <input type="number" name="book_id" class="input" value="{{ $loan->book_id }}">
        </div>

        <div class="formContainer">
            <label for="returnDate">Data de devolução: </label>
            <input type="date" name="returnDate" class="input" value="{{ $loan->returnDate }}">
        </div>

        <div class="formContainer">
            <select name="school_id">
                <option value="">selecione</option>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ $user->school_id == $school->id ? 'selected' : '' }} >{{ $school->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('loans.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="atualizar" id="create">
        </div>
    </form>
    
@endsection