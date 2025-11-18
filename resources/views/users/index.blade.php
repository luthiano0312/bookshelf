@extends('layouts.main')

@section('title', 'usuários')

@section('headerTitle', 'listagem de usuários')

@section('content')
    <div id="buttonAndMessage">
        @if (session('success'))
            <div id="message">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('users.create') }}" id="button">cadastrar</a>
    </div>

    <table id="table">
        <thead id="thead">
            <tr class="tr">
                <th class="td">ID</th>
                <th class="td">Nome</th>
                <th class="td">nivel</th>
                <th class="td">email</th>
                <th class="td">ID da escola</th>
                <td class="td">ação</td>
            </tr>
        </thead>

        <tbody id="tbody">
            @foreach( $users as $user)
            <tr class="tr">
                <td class="td">{{ $user->id }}</td>
                <td class="td">{{ $user->name }}</td>
                <td class="td">{{ $user->role }}</td>
                <td class="td">{{ $user->email  }}</td>
                <td class="td">{{ $user->school_id }}</td>
                <td class="td" id="action">
                    <a href="{{ route('users.edit', $user->id) }}" id="editButton">Editar</a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="post" onsubmit="return confirm('tem certeza que deseja excluir?')">
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