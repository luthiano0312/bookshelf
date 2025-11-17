@extends('layouts.main')

@section('title', 'escolas')

@section('headerTitle', 'Listagem de escolas')

@section('content')
    <div id="buttonAndMessage">
        @if (session('success'))
            <div id="message">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('schools.create') }}" id="button">cadastrar</a>
    </div>

    <table id="table">
        <thead id="thead">
            <tr class="tr">
                <th class="td">ID</th>
                <th class="td">Nome</th>
                <th class="td">CNPJ</th>
                <th class="td">email</th>
                <th class="td">Ação</th>
            </tr>
        </thead>

        <tbody id="tbody">
            @foreach( $schools as $school)
            <tr class="tr">
                <td class="td">{{ $school->id }}</td>
                <td class="td">{{ $school->name }}</td>
                <td class="td">{{ $school->amount }}</td>
                <td class="td">{{ $school->price }}</td>
                <td class="td" id="action">
                    <a href="{{ route('schools.edit', $school->id) }}" id="editButton">Editar</a>

                    <form action="{{ route('schools.destroy', $school->id) }}" method="post" onsubmit="return confirm('tem certeza que deseja excluir?')">
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