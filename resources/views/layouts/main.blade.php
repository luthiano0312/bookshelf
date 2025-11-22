<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body id="body" class="flex h-screen w-screen bg-sky-50">
    <aside class="flex flex-col bg-blue-600 w-[15%] text-white text-3xl h-full">
        <div id="logo" class="flex h-[10%] justify-center items-center">
            <p>BookShelf</p>
        </div>
        @if(auth()->user()->role == 1)
            <a href="{{ route('schools.index') }}" class="p-[5%] hover:bg-blue-700">Escolas</a>
            <a href="{{ route('users.index') }}" class="p-[5%] hover:bg-blue-700">Usuarios</a>            
        @endif
        @if(auth()->user()->role == 2)
            <a href="{{ route('librarians.index') }}" class="p-[5%] hover:bg-blue-700">Bibliotacarios</a>
        @endif
        <a href="{{ route('categories.index') }}" class="p-[5%] hover:bg-blue-700">Categorias</a>
        <a href="{{ route('books.index') }}" class="p-[5%] hover:bg-blue-700">Livros</a>
        <a href="{{ route('loans.index') }}" class="p-[5%] hover:bg-blue-700">Emprestimos</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="m-[5%]  mb-[10%] hover:underline cursor: pointer w-fit text-3xl">encerrar sessão</button>
        </form>
    </aside>

    <div class="p-[3%] w-full">
        <header id="header" class="h-[10%]">
            <p class="font-medium text-5xl ">@yield('headerTitle')</p>
        </header>

        <main id="main" class="flex flex-col items-center gap-[5%] h-[95%]">
            @yield('content')
        </main>
    </div>
</body>
</html>