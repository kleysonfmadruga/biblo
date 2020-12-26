@extends('templates.main')

@section('page-name')
    <title>Biblo - Início</title>
@endsection

@section('main')
    <article class="bg-gray-50 py-6 px-16">
        <section class="flex flex-row justify-evenly">
            
            @foreach($selection_list_1 as $sel)
                <a class="flex flex-col px-4 py-8 mb-2 w-72 h-48 bg-gradient-to-{{$sel['grad_direction']}} from-{{$sel['grad_from']}} to-{{$sel['grad_to']}} rounded-md hover:z-10 shadow-md transform hover:rotate-1 hover:shadow-lg justify-end duration-200 group" href="#">
                    <h3 class="text-lg text-white duration-200 group-hover:underline group-hover:rotate-1">{!!$sel['title_sup']!!}</h3>
                    <h3 class="text-lg text-white duration-200 group-hover:underline group-hover:rotate-1">{!!$sel['title_sub']!!}</h3>
                </a>
            @endforeach
        
        </section>
        <section class="flex flex-col mt-6 pb-6">
            <hr class="border-gray-300"/>
            <h3 class="text-xl font-bold text-gray-900 h-12 mt-4">Seleção do dia: um mundo de magia e uma escola de bruxaria &#x1F9D9;</h3>
            <div class="flex flex-row justify-evenly items-center mb-4">
        
                @foreach ($book_list_1 as $book)
                    <a href={{url($book['link'])}} class="flex flex-col w-52 p-4 justify-center rounded-md hover:bg-gray-200 hover:z-10 hover:shadow-md duration-200">
                        <img src={{url("storage/book_covers/mini/{$book['cover']}")}} alt="Livro" class="h-64"/>
                        <p class="mt-2 truncate">{{$book['name']}}</p>
                    </a>
                @endforeach
        
                <a href="#" class="p-2 bg-gray-100 hover:bg-gray-200 rounded hover:z-10 hover:shadow duration-200">Ver mais</a>
            </div>
            <hr class="border-gray-300" />
        </section>
        <section class="flex flex-row justify-evenly">
        
            @foreach($selection_list_2 as $sel)
                <a class="flex flex-col px-4 py-8 mb-2 w-72 h-48 bg-gradient-to-{{$sel['grad_direction']}} from-{{$sel['grad_from']}} to-{{$sel['grad_to']}} transform hover:rotate-1 rounded-md hover:z-10 shadow-md hover:shadow-lg justify-end duration-200 group" href="#">
                    <h3 class="text-lg text-white duration-200 group-hover:underline group-hover:rotate-1">{!!$sel['title_sup']!!}</h3>
                    <h3 class="text-lg text-white duration-200 group-hover:underline group-hover:rotate-1">{!!$sel['title_sub']!!}</h3>
                </a>
            @endforeach

        </section>
        <section class="flex flex-col mt-6 pb-6">
            <hr class="border-gray-300"/>
            <h3 class="text-xl font-bold text-gray-900 h-12 mt-4">Os clássicos que nunca saem de moda &#x1F913;</h3>
            <div class="flex flex-row justify-evenly items-center mb-4">
            
                @foreach ($book_list_2 as $book)
                    <a href={{url($book['link'])}} class="flex flex-col w-52 p-4 justify-center rounded-md hover:bg-gray-200 hover:z-10 hover:shadow-md duration-200">
                        <img src={{url("storage/book_covers/mini/{$book['cover']}")}} alt="Livro" class="h-64"/>
                        <p class="mt-2 truncate">{{$book['name']}}</p>
                    </a>
                @endforeach
            
                <a href="#" class="p-2 bg-gray-100 hover:bg-gray-200 rounded hover:z-10 hover:shadow duration-200">Ver mais</a>
            </div>
            <hr class="border-gray-300" />
        </section>
    </article>
@endsection