@extends('layouts.main')

@section('title', 'cadastro')

@section('headerTitle', 'Cadastro de categorias')

@section('content')

    @if (session('error'))
        <div id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="post" id="formCreate">
        @csrf   

        <h1 id="formTitle">Cadastrar</h1>

        <div class="formContainer">
            <label for="name">Nome: </label>
            <input type="text" name="name" class="input" value="{{ old('name') }}">
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
                <a href="{{ route('categories.index') }}" id="cancel">Cancelar</a>
            </div>

            <input type="submit" value="Cadastrar" id="create">
        </div>
    </form>
    
@endsection