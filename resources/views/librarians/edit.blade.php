@extends('layouts.main')

@section('title', 'edição')

@section('headerTitle', 'Edição de bibliotecários')

@section('content')

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded-xl w-full max-w-2xl mx-auto mb-4">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form 
        action="{{ route('librarians.update', $librarian->id) }}" 
        method="post"
        class="bg-white shadow-md rounded-2xl p-8 w-full max-w-2xl mx-auto mt-6"
    >
        @csrf
        @method('put')

        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Editar bibliotecário</h1>

        <div class="mb-5">
            <label for="name" class="block text-lg font-semibold text-gray-700 mb-1">Nome</label>
            <input 
                type="text"
                name="name"
                value="{{ $librarian->name }}"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg 
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('name')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="email" class="block text-lg font-semibold text-gray-700 mb-1">Email</label>
            <input 
                type="text"
                name="email"
                value="{{ $librarian->email }}"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg 
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('email')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="role" class="block text-lg font-semibold text-gray-700 mb-1">Nível</label>
            <select 
                name="role"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="1" {{ $librarian->role == 1 ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ $librarian->role == 2 ? 'selected' : '' }}>Gestor</option>
                <option value="3" {{ $librarian->role == 3 ? 'selected' : '' }}>Bibliotecário</option>
            </select>

            @error('role')
                <p class="text-red-600 text-sm">{{ $message }}</p>
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
                        <option 
                            value="{{ $school->id }}"
                            {{ $librarian->school_id == $school->id ? 'selected' : '' }}
                        >
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>

                @error('school_id')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
        @endif

        <div class="flex justify-between mt-8">
            <a 
                href="{{ route('librarians.index') }}"
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
