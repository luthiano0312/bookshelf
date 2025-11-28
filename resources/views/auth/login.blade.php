
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body id="body" class="flex h-screen w-screen bg-sky-50">
    <div class="flex justify-center items-center w-full">
    
        <form 
            method="POST" 
            action="{{ route('login') }}"
            class="bg-white shadow-lg p-10 rounded-[3vh] w-[90%] max-w-[450px] mt-10"
        >
            @csrf
    
            <h1 class="text-3xl font-semibold mb-8 text-center text-gray-700">
                Login
            </h1>
    
            {{-- EMAIL --}}
            <div class="mb-6">
                @error('email')
                    <p class="text-red-600 text-sm mb-1">{{ $message }}</p>
                @enderror
    
                <label for="email" class="block mb-1 font-medium text-gray-700">
                    Email:
                </label>
    
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl
                            focus:outline-none focus:ring-2 focus:ring-blue-600"
                >
            </div>
    
            {{-- SENHA --}}
            <div class="mb-6">
                @error('password')
                    <p class="text-red-600 text-sm mb-1">{{ $message }}</p>
                @enderror
    
                <label for="password" class="block mb-1 font-medium text-gray-700">
                    Senha:
                </label>
    
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl
                            focus:outline-none focus:ring-2 focus:ring-blue-600"
                >
            </div>
    
            {{-- LEMBRAR-ME --}}
            <div class="flex items-center gap-2 mb-6">
                <input 
                    type="checkbox" 
                    name="remember" 
                    id="remember"
                    class="w-4 h-4 border-gray-300 rounded cursor-pointer text-blue-600
                            focus:ring-blue-600"
                >
                <label for="remember" class="text-gray-700 cursor-pointer">
                    Lembrar de mim
                </label>
            </div>
    
            {{-- ESQUECEU A SENHA --}}
            @if (Route::has('password.request'))
                <div class="text-right mb-6">
                    <a 
                        href="{{ route('password.request') }}"
                        class="text-sm text-blue-600 hover:underline"
                    >
                        Esqueceu a senha?
                    </a>
                </div>
            @endif
    
            {{-- BOTÃO --}}
            <div class="flex justify-center">
                <button 
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 transition text-white 
                            px-6 py-2 rounded-xl cursor-pointer text-lg font-semibold"
                >
                    Entrar
                </button>
            </div>
    
        </form>
    
    </div>
</body>
</html>
