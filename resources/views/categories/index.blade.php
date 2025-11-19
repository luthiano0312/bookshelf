@extends('layouts.main')

@section('title', 'categorias')

@section('headerTitle', 'listagem de categorias')

@section('content')
    <div id="buttonAndMessage">
        @if (session('success'))
            <div id="message">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('categories.create') }}" id="button">cadastrar</a>
    </div>

    <table id="table">
        <thead id="thead">
            <tr class="tr">
                <th class="td">ID</th>
                <th class="td">categoria</th>
                <th class="td">ID da escola</th>
                <td class="td">ação</td>
            </tr>
        </thead>

        <tbody id="tbody">
            @foreach( $categories as $category)
            <tr class="tr">
                <td class="td">{{ $category->id }}</td>
                <td class="td">{{ $category->name }}</td>
                <td class="td">{{ $category->school_id }}</td>
                <td class="td" id="action">
                    <a href="{{ route('categories.edit', $category->id) }}" id="editButton">Editar</a>

                    <form action="{{ route('categories.destroy', $category->id) }}" method="post" onsubmit="return confirm('tem certeza que deseja excluir?')">
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