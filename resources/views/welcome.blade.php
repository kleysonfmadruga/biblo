<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biblo</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    </head>
    <body>
    
        <div class="flex flex-row px-24 items-center h-screen w-screen bg-gradient-to-br from-blue-400 to-indigo-800 rotate-12">
            <main class="w-8/12 mx-4">
                <h1 class="text-4xl font-bold text-white">Bem-vind@ ao Biblo!</h1>
                <h3 class="text-lg font-semibold text-white">Venha conosco, vamos nos aventurar pelo universo da leitura! &#x1F603; &#x1F4D6;</h3>
                <img src="{{asset('img/pessoa-lendo-deitada.jpg')}}" alt="Pessoa lendo livro" class="w-3/5 mt-8 rounded-md">
                <a href="https://www.pexels.com/pt-br/foto/sozinho-solitario-livro-biblioteca-4866040/" target="_blank" class="text-xs text-white hover:underline mt-1 mb-8">Foto de cottonbro no Pexels</a>
            </main>

            <aside class="w-4/12 mx-4">
                <form action="/login" method="post" class=" rounded-lg flex flex-col px-8 py-16 items-center shadow-lg bg-white">
                    @csrf
                    <label for="email" class="w-64 h-8 text-lg">E-mail</label>
                    <input type="email" name="email" id="email" class="border-2 bg-gray-100 rounded-md w-64 h-8 px-1 text-base focus:outline-none focus:border-gray-400 focus:bg-white">
                    <label for="passwd" class="w-64 h-8 mt-2 text-lg">Senha</label>
                    <input type="password" name="passwd" id="passwd" class="border-2 bg-gray-100 rounded-md w-64 h-8 px-1 text-base focus:outline-none focus:border-gray-400 focus:bg-white">
                    <p class="h-8 text-sm mt-4">Esqueceu sua senha? Clique <a href="#" class="text-blue-600 hover:underline">aqui</a>.</p>
                    <input type="submit" value="Entrar" class="w-64 h-8 bg-blue-800 text-white font-bold rounded-md focus:outline-none hover:bg-blue-900 cursor-pointer">
                    <hr class="h-1 border-gray-400 w-48 my-6"/>
                    <p class="text-sm">O quê? Ainda não possui uma? &#x1F631;</p>
                    <p class="text-sm">Crie uma por <a href="{{ route('new_profile') }}" class="text-blue-600 hover:underline">aqui</a>.</p>
                </form>
            </aside>
        </div>

    </body>
</html>
