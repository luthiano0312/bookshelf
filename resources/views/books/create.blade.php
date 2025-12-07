@extends('layouts.main')

@section('title', 'cadastro')

@section('headerTitle', 'Cadastro de livros')

@section('content')

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded-xl w-full max-w-2xl mx-auto mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form 
        action="{{ route('books.store') }}" 
        method="post"
        class="bg-white shadow-md rounded-2xl p-8 w-full max-w-2xl mx-auto mt-6"
    >
        @csrf   

        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Cadastrar livro</h1>

        <div class="mb-5">
            <label for="title" class="block text-lg font-semibold text-gray-700 mb-1">Título</label>
            <input 
                type="text"
                name="title"
                value="{{ old('title') }}"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="author" class="block text-lg font-semibold text-gray-700 mb-1">Autor</label>
            <input 
                type="text"
                name="author"
                value="{{ old('author') }}"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('author')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="category_id" class="block text-lg font-semibold text-gray-700 mb-1">Categoria</label>

            <select
                name="category_id"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="">Selecione</option>
                @foreach ($categories as $category)
                    <option 
                        value="{{ $category->id }}" 
                        {{ old("category_id") == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        @if(auth()->user()->role == 1)
            <div class="mb-5">
                <label for="school_id" class="block text-lg font-semibold text-gray-700 mb-1">Escola</label>

                <select
                    name="school_id"
                    class="w-full p-3 border border-gray-300 rounded-xl text-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Selecione</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>

                @error('school_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        @endif

        <div class="flex justify-between mt-8">
            <a 
                href="{{ route('books.index') }}"
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
                Cadastrar
            </button>
        </div>

    </form>

@endsection
