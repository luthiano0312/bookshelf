@extends('layouts.main')

@section('title', 'livors')

@section('headerTitle', 'listagem de livros')

@section('content')
    <div id="buttonAndMessage">
        @if (session('success'))
            <div id="message">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('books.create') }}" id="button">cadastrar</a>
    </div>

    <table id="table">
        <thead id="thead">
            <tr class="tr">
                <th class="td">ID</th>
                <th class="td">Titulo</th>
                <th class="td">Autor</th>
                <th class="td">Categoria</th>
                <th class="td">ID da escola</th>
                <td class="td">ação</td>
            </tr>
        </thead>

        <tbody id="tbody">
            @foreach( $books as $book)
            <tr class="tr">
                <td class="td">{{ $book->id }}</td>
                <td class="td">{{ $book->title }}</td>
                <td class="td">{{ $book->author }}</td>
                <td class="td">
                    @foreach( $categories as $category)
                        {{ $book->category_id == $category->id ? $category->name : '' }}
                    @endforeach
                </td>
                <td class="td">{{ $book->school_id  }}</td>

                <td class="td" id="action">
                    <a href="{{ route('books.edit', $book->id) }}" id="editButton">Editar</a>

                    <form action="{{ route('books.destroy', $book->id) }}" method="post" onsubmit="return confirm('tem certeza que deseja excluir?')">
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