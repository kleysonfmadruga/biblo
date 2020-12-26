<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

  @yield('page-name')

</head>
<body class="{{ env("APP_DEBUG") ? 'debug-screens' : '' }}">
  <div class="w-full bg-gray-100 flex flex-col items-center">

    <header class="w-full h-12 bg-blue-800 flex flex-row items-center justify-between">
      <a href="{{route('index')}}" class="font-bold text-white text-lg w-1/12 text-center">
        Biblo
      </a>
      <div id="profile-dropdown" class="w-3/12 h-full relative inline-block">
        <button onclick="toggleDropdownVisibilityHandler()" id="profile-dropdown-button" class="hover:bg-blue-900 font-bold text-white text-lg w-full h-full flex flex-row justify-end items-center focus:outline-none">
          <p class="">{{$user->name}}</p>
          <img src="{{url($user->photo)}}" alt="a" class="rounded-full w-8 mx-5 my-2" />
        </button>
        <div id="profile-dropdown-content" class="absolute mx-10 z-10 rounded-b-lg bg-white shadow-sm w-64 pb-2 flex-col hidden">
          <a href="#" class="py-2 px-4 w-full hover:bg-gray-200">Meu perfil</a>
          <a href="#" class="py-2 px-4 w-full hover:bg-gray-200">Configurações</a>
          <hr class="h-1 border-gray-400 w-48 my-1 mx-8"/>
          <form action="{{ route('profile.logout') }}" method="post" class="py-2 px-4 w-full">
            @csrf
            <input type="submit" value="Sair" class="w-full py-1 bg-blue-800 hover:bg-blue-900 rounded-md text-white font-semibold focus:outline-none cursor-pointer">
          </form>
        </div>
      </div>
    </header>

    <main class="w-10/12">
      @yield('main')
    </main>

    <footer class="w-full h-32 bg-gray-900 ">

    </footer>

  </div>
  <script>
    window.onclick = (event) => {
      var dropMenu = document.querySelector('#profile-dropdown-content')
      if(!event.target.matches('#profile-dropdown-button *') && !dropMenu.classList.contains('hidden')) {
        let isHidden = dropMenu.classList.toggle('hidden')
        console.log("Ligando o hidden", isHidden)
        let isFlex = dropMenu.classList.toggle('flex')
        console.log("Desligando o flex", isFlex)
        console.log(event.target.matches('#profile-dropdown-button *'))
      console.log(event.target)
      }
    }

    function toggleDropdownVisibilityHandler(){
      var dropMenu = document.querySelector('#profile-dropdown-content')
      let isHidden = dropMenu.classList.toggle('hidden');
      console.log("Desigando o hidden", isHidden)
      let isFlex = dropMenu.classList.toggle('flex');
      console.log("Ligando o flex", isFlex)
    }

  </script>

</body>
</html>