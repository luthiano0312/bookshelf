@extends('layouts.main')

@section('title', 'cadastro')

@section('headerTitle', 'Cadastro de emprestimos')

@section('content')

    <!-- @if ($errors->any())
        {{ 'asdasdasd' }}
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif -->

    <form action="{{ route('loans.store') }}" method="post" id="formCreate">
        @csrf   

        <h1 id="formTitle">Cadastrar</h1>

        <div class="formContainer">
            @error ('studentName')
                {{ $message }}
            @enderror
            <label for="studentName">Nome do estudante: </label>
            <input type="text" name="studentName" class="input" value="{{ old('studentName') }}">
        </div>

        <div class="formContainer">
            @error ('book_id')
                {{ $message }}
            @enderror
            <label for="book_id">ID do livro: </label>
            <input type="number" name="book_id" class="input" value="{{ old('book_id') }}">
        </div>

        <div class="formContainer">
            @error ('returnDate')
                {{ $message }}
            @enderror
            <label for="returnDate">Data de devolução: </label>
            <input type="text" name="returnDate" class="input" id="returnDate" value="{{ old('returnDate') }}">
        </div>
        <script>
            $('#returnDate').mask('00/00/0000');
        </script>

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

        <input type="hidden" name="status" class="input" id="returnDate" value="ativo">

        <div id="buttonContainer">
            <div id="cancelContainer">
                <a href="{{ route('loans.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="Cadastrar" id="create">
        </div>
    </form>
    
@endsection