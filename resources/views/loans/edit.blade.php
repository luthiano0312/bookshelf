@extends('layouts.main')

@section('title', 'edição')

@section('headerTitle', 'edição de emprestimos')

@section('content')

    @if ($errors->any())
        {{ 'asdasdasd' }}
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif

    <form action="{{ route('loans.update', $loan->id) }}" method="post" id="formCreate">
        @csrf   
        @method('put')

        <h1 id="formTitle">editar</h1>

        <div class="formContainer">
            <label for="studentName">Nome do estudante: </label>
            <input type="text" name="studentName" class="input" value="{{ $loan->studentName }}">
        </div>

        <div class="formContainer">
            <label for="book_id">ID do livro: </label>
            <input type="number" name="book_id" class="input" value="{{ $loan->book_id }}">
        </div>

        <div class="formContainer">
            <label for="returnDate">Data de devolução: </label>
            <input type="date" name="returnDate" class="input" value="{{ $loan->returnDate }}">
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
                <a href="{{ route('loans.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="atualizar" id="create">
        </div>
    </form>
    
@endsection