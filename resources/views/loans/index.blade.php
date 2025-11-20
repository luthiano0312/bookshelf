@extends('layouts.main')

@section('title', 'emprestimos')

@section('headerTitle', 'listagem de emprestimos')

@section('content')
    <div id="buttonAndMessage">
        @if (session('success'))
            <div id="message">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('loans.create') }}" id="button">cadastrar</a>
    </div>

    <table id="table">
        <thead id="thead">
            <tr class="tr">
                <th class="td">ID</th>
                <th class="td">Nomde do estudante</th>
                <th class="td">ID do livro</th>
                <th class="td">Nome do livro</th>
                <th class="td">Data devolução</th>
                <th class="td">Status</th>
                <th class="td">ID da escola</th>
                <td class="td">ação</td>
            </tr>
        </thead>

        <tbody id="tbody">
            @foreach( $loans as $loan)
            <tr class="tr">
                <td class="td">{{ $loan->id }}</td>
                <td class="td">{{ $loan->StudentName }}</td>
                <td class="td">{{ $loan->book_id }}</td>
                <td class="td">
                    @foreach( $books as $book)
                        {{ $loan->book_id == $book->id ? $book->title : '' }}
                    @endforeach
                </td>
                
                <td class="td">{{ $loan->returnDate_formatted  }}</td>
                <td class="td">{{ $loan->status }}</td>
                <td class="td">{{ $loan->school_id }}</td>

                <td class="td" id="action">
                    <a href="{{ route('loans.edit', $loan->id) }}" id="editButton">Editar</a>

                    <form action="{{ route('loans.destroy', $loan->id) }}" method="post" onsubmit="return confirm('tem certeza que deseja excluir?')">
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