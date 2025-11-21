@extends('layouts.main')

@section('title', 'bibliotecarios')

@section('headerTitle', 'listagem de bibliotecarios')

@section('content')
    <div id="buttonAndMessage">
        @if (session('success'))
            <div id="message">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('librarianss.create') }}" id="button">cadastrar</a>
    </div>

    <table id="table">
        <thead id="thead">
            <tr class="tr">
                <th class="td">ID</th>
                <th class="td">Nome</th>
                <th class="td">Cargo</th>
                <th class="td">email</th>
                <th class="td">ID da escola</th>
                <td class="td">ação</td>
            </tr>
        </thead>

        <tbody id="tbody">
            @foreach( $librarianss as $librarians)
                <tr class="tr">
                    <td class="td">{{ $librarians->id }}</td>
                    <td class="td">{{ $librarians->name }}</td>
                    <td class="td">{{ $librarians->role }}</td>
                    <td class="td">{{ $librarians->email  }}</td>
                    <td class="td">{{ $librarians->school_id }}</td>
                    <td class="td" id="action">
                        <a href="{{ route('librarianss.edit', $librarians->id) }}" id="editButton">Editar</a>

                        <form action="{{ route('librarianss.destroy', $librarians->id) }}" method="post" onsubmit="return confirm('tem certeza que deseja excluir?')">
                            @csrf
                            @method('delete')

                            <input type="submit" value="Excluir" id="deleteButton">
                        </form>                
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection