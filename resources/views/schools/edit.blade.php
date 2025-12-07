@extends('layouts.main')

@section('title', 'edição')

@section('headerTitle', 'Edição de escolas')

@section('content')

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded-xl w-full max-w-2xl mx-auto mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form 
        action="{{ route('schools.update', $school->id) }}" 
        method="post"
        class="bg-white shadow-md rounded-2xl p-8 w-full max-w-2xl mx-auto mt-6"
    >
        @csrf 
        @method('put')

        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Editar escola</h1>

        <div class="mb-5">
            <label for="name" class="block text-lg font-semibold text-gray-700 mb-1">Nome</label>

            <input 
                type="text" 
                name="name"
                value="{{ $school->name }}"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="cnpj" class="block text-lg font-semibold text-gray-700 mb-1">CNPJ</label>

            <input 
                type="text" 
                name="cnpj"
                id="cnpj"
                value="{{ $school->cnpj }}"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            @error('cnpj')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                $('#cnpj').mask('00.000.000/0000-00');
            });
        </script>

        <div class="mb-5">
            <label for="email" class="block text-lg font-semibold text-gray-700 mb-1">Email</label>

            <input 
                type="text" 
                name="email" 
                value="{{ $school->email }}"
                class="w-full p-3 border border-gray-300 rounded-xl text-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between mt-8">
            <a 
                href="{{ route('schools.index') }}"
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
