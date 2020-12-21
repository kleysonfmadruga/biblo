<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastre-se no Biblo</title>
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>
  <div class="w-screen h-screen bg-gradient-to-bl from-blue-400 to-indigo-800 flex flex-row justify-center items-center px-24">
    <form action="{{ route('profile.store') }}" method="post" class="flex flex-col w-4/12 h-4/5 px-8 py-10 mx-4 bg-white rounded-md shadow-lg items-center justify-center">
      @csrf

      @if ($errors->has('email'))
        <p class="border-2 border-red-600 rounded-md text-red-600 w-64 text-xs text-center">Xi... Parece que seu e-mail não é válido. &#x1F605;<br />Que tal tentar novamente?</p>
      @elseif($errors->has('name'))
        <p class="border-2 border-red-600 rounded-md text-red-600 w-64 text-xs text-center">Xi... Parece que seu nome não é válido. &#x1F605;<br />Que tal tentar novamente?</p>
      @elseif($errors->has('passwd_confirm'))
        <p class="border-2 border-red-600 rounded-md text-red-600 w-64 text-xs text-center">Xi... Parece que a senha e a confirmação são diferentes. &#x1F605;<br />Que tal tentar novamente?</p>
      @elseif($errors->has('passwd'))
        <p class="border-2 border-red-600 rounded-md text-red-600 w-64 text-xs text-center">Xi... Parece que sua senha é muito pequena. &#x1F605;<br />Tente novamente com 6 ou mais caracteres</p>
      @elseif($errors->any())
        <p class="border-2 border-red-600 rounded-md text-red-600 w-64 text-xs text-center">Xi... Parece que algo deu errado. Só não sabemos o quê. &#x1F605;<br />Que tal tentar mais tarde?</p>
      @endif
      
      <label for="name" class="text-lg mt-2 w-64 h-8">Nome</label>
      <input type="text" name="name" id="name" class="border-2 bg-gray-100 rounded-md w-64 h-8 px-1 text-base focus:outline-none focus:border-gray-400 focus:bg-white" value="{{old('name')}}" />
      
      <label for="email" class="text-lg mt-2 w-64 h-8">E-mail</label>
      <input type="email" name="email" id="email" class="border-2 bg-gray-100 rounded-md w-64 h-8 px-1 text-base focus:outline-none focus:border-gray-400 focus:bg-white" value="{{old('email')}}"/>
      
      <label for="passwd" class="text-lg w-64 mt-2 h-8">Senha</label>
      <input type="password" name="passwd" id="passwd" class="border-2 bg-gray-100 rounded-md w-64 h-8 px-1 text-base focus:outline-none focus:border-gray-400 focus:bg-white"/>
      
      <label for="passwd" class="text-lg w-64 mt-2 h-8">Confirme sua senha</label>
      <input type="password" name="passwd_confirm" id="passwd_confirm" class="border-2 bg-gray-100 rounded-md w-64 h-8 px-1 text-base focus:outline-none focus:border-gray-400 focus:bg-white"/>
      <input type="submit" value="Cadastrar" class="w-64 h-8 bg-blue-800 text-white font-bold rounded-md focus:outline-none hover:bg-blue-900 cursor-pointer mt-6"/>
      
      <hr class="h-1 border-gray-400 w-48 my-6"/>
      <p class="text-sm">Já possui uma conta? Entre por <a href="{{route('login')}}" class="text-blue-600 hover:underline">aqui</a>. &#x1F601;</p>

    </form>
  </div>
</body>
</html>