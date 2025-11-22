@extends('layouts.main')

@section('title', 'bibliotecarios')

@section('headerTitle', 'Listagem de bibliotecarios')

@section('content')
    <div id="buttonAndMessage" class="w-full flex flex-row-reverse gap-[2%] h-16">
        <a href="{{ route('librarians.create') }}" 
            id="button" 
            class="flex justify-center items-center p-6 text-xl text-white bg-blue-500 rounded-xl hover:bg-blue-800">
            cadastrar
        </a>

        @if (session('success')) 
            <div id="message" class="flex items-center p-6 bg-green-400 w-full rounded-xl text-xl">
                {{ session('success') }} 
            </div>
        @endif
    </div>

    <table id="table" class="shadow-md overflow-hidden rounded-[2vh] px-4 border border-black-500 bg-white w-full">
        <thead id="thead" class="bg-blue-800 border-b border-gray-500 text-white">
            <tr class="h-16">
                <th class="w-[1%]"></th>
                <th class="text-left w-[2%] text-xl p-4">ID</th>
                <th class="text-left w-[20%] text-xl p-4">Nome</th>
                <th class="text-left w-[20%] text-xl p-4">Cargo</th>
                <th class="text-left w-[20%] text-xl p-4">Email</th>
                <th class="text-left w-[10%] text-xl p-4">ID da Escola</th>
                <th class="text-left w-[10%] text-xl p-4">Ação</th>
            </tr>
        </thead>

        <tbody id="tbody">
            @foreach( $librarians as $librarian )
                <tr class="hover:bg-gray-100 border-b border-gray-300">
                    <td class="w-[1%]"></td>
                    <td class="text-left w-[2%] text-lg px-4 py-2 font-bold">{{ $librarian->id }}</td>
                    <td class="text-left w-[20%] text-lg px-4 py-2">{{ $librarian->name }}</td>
                    <td class="text-left w-[20%] text-lg px-4 py-2">{{ $librarian->role }}</td>
                    <td class="text-left w-[20%] text-lg px-4 py-2">{{ $librarian->email }}</td>
                    <td class="text-left w-[10%] text-lg px-4 py-2">{{ $librarian->school_id }}</td>

                    <td class="text-left w-[10%] text-lg px-4 py-2 flex gap-4" id="action">
                        <a href="{{ route('librarians.edit', $librarian->id) }}" id="editButton"  class="text-blue-600 hover:text-blue-900 font-semibold">
                            Editar
                        </a>

                        <form action="{{ route('librarians.destroy', $librarian->id) }}" 
                              method="post" 
                              onsubmit="return confirm('tem certeza que deseja excluir?')">
                            @csrf
                            @method('delete')

                            <input type="submit" value="Excluir" id="deleteButton" class="text-red-600 hover:text-red-900 font-semibold cursor-pointer bg-transparent">
                        </form>                
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
