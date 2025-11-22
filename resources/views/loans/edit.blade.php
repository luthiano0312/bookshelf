@extends('layouts.main')

@section('title', 'edição')

@section('headerTitle', 'Edição de empréstimos')

@section('content')

    {{-- ALERTA DE ERROS --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded-xl w-full max-w-2xl mx-auto mb-4">
            <strong>Erro:</strong>
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form 
        action="{{ route('loans.update', $loan->id) }}" 
        method="post"
        class="bg-white shadow-md rounded-2xl p-8 w-full max-w-2xl mx-auto mt-6"
    >
        @csrf   
        @method('put')

        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Editar empréstimo</h1>

        {{-- NOME DO ALUNO --}}
        <div class="mb-5">
            <label for="studentName" class="block text-lg font-semibold text-gray-700 mb-1">
                Nome do estudante
            </label>

            <input 
                type="text"
                name="studentName"
                value="{{ $loan->studentName }}"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            @error('studentName')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- ID DO LIVRO --}}
        <div class="mb-5">
            <label for="book_id" class="block text-lg font-semibold text-gray-700 mb-1">
                ID do livro
            </label>

            <input 
                type="number"
                name="book_id"
                value="{{ $loan->book_id }}"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            @error('book_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- DATA DE DEVOLUÇÃO --}}
        <div class="mb-5">
            <label for="returnDate" class="block text-lg font-semibold text-gray-700 mb-1">
                Data de devolução
            </label>

            <input 
                type="date"
                name="returnDate"
                value="{{ $loan->returnDate }}"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            @error('returnDate')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- ESCOLA (ADM) --}}
        @if(auth()->user()->role == 1)
            <div class="mb-5">
                <label for="school_id" class="block text-lg font-semibold text-gray-700 mb-1">
                    Escola
                </label>

                <select
                    name="school_id"
                    class="w-full p-3 border border-gray-300 rounded-xl text-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Selecione</option>
                    @foreach ($schools as $school)
                        <option 
                            value="{{ $school->id }}"
                            {{ $loan->school_id == $school->id ? 'selected' : '' }}
                        >
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>

                @error('school_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        @endif

        {{-- BOTÕES --}}
        <div class="flex justify-between mt-8">
            <a 
                href="{{ route('loans.index') }}"
                class="px-6 py-3 text-lg bg-gray-300 rounded-xl hover:bg-gray-400
                       transition font-semibold"
            >
                Cancelar
            </a>

            <button 
                type="submit"
                class="px-6 py-3 text-lg bg-blue-600 text-white rounded-xl 
                       hover:bg-blue-800 transition font-semibold"
            >
                Atualizar
            </button>
        </div>

    </form>

@endsection
