<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        
        $book_list_1 = [
            [
                "link" => "#",
                "name" => "Harry Potter e a Pedra Filosofal",
                "cover" => "harry-potter-e-a-pedra-filosofal.jpeg"
            ],
            [
                "link" => "#",
                "name" => "Harry Potter e o Enigma do Príncipe",
                "cover" => "harry-potter-e-o-enigma-do-principe.jpeg"
            ],
            [
                "link" => "#",
                "name" => "Harry Potter e a Ordem da Fênix",
                "cover" => "harry-potter-e-a-ordem-da-fenix.jpeg"
            ],
            [
                "link" => "#",
                "name" => "Harry Potter e as Relíquias da Morte",
                "cover" => "harry-potter-e-as-reliquias-da-morte.jpeg"
            ]
        ];

        $book_list_2 = [
            [
                "link" => "#",
                "name" => "Dom Quixote de la Mancha",
                "cover" => "dom-quixote-de-la-mancha.jpeg"
            ],
            [
                "link" => "#",
                "name" => "Romeu e Julieta",
                "cover" => "romeu-e-julieta.jpeg"
            ],
            [
                "link" => "#",
                "name" => "O Pequeno Príncipe",
                "cover" => "o-pequeno-principe.jpeg"
            ],
            [
                "link" => "#",
                "name" => "A Metamorfose",
                "cover" => "a-metamorfose.jpeg"
            ]
        ];

        $selection_list_1 = [
            [
                "link" => "#",
                "title_sup" => "Novo no Biblo?",
                "title_sub" => "Comece por aqui &#x1F609;",
                "grad_direction" => "tr",
                "grad_from" => "yellow-400",
                "grad_to" => "purple-500"
            ],
            [
                "link" => "#",
                "title_sup" => "Cuidado com",
                "title_sub" => "o que espreita nas sombras... &#x1F47B;",
                "grad_direction" => "b",
                "grad_from" => "indigo-500",
                "grad_to" => "black"
            ],
            [
                "link" => "#",
                "title_sup" => "Preguiça de escolher?",
                "title_sub" => "Vamos dar um rolê aleatório! &#x1F929;",
                "grad_direction" => "tl",
                "grad_from" => "green-600",
                "grad_to" => "yellow-400"
            ]
        ];

        $selection_list_2 = [
            [
                "link" => "#",
                "title_sup" => "Roi rs. Letícia, né?",
                "title_sub" => "Gostaria de um romance? &#x1F60D;",
                "grad_direction" => "br",
                "grad_from" => "pink-300",
                "grad_to" => "red-600"
            ],
            [
                "link" => "#",
                "title_sup" => "As fadas existem",
                "title_sub" => "e eu posso provar! &#x1F9DA;&#x2728;",
                "grad_direction" => "r",
                "grad_from" => "purple-400",
                "grad_to" => "pink-600"
            ],
            [
                "link" => "#",
                "title_sup" => "Venha, aventureiro!",
                "title_sub" => "Vamos desbravar esta selva &#x1F920;",
                "grad_direction" => "bl",
                "grad_from" => "green-300",
                "grad_to" => "green-700"
            ]
        ];

        return view(
            'index',
            array(
                'user' => $user,
                'book_list_1' => $book_list_1,
                'book_list_2' => $book_list_2,
                'selection_list_1' => $selection_list_1,
                'selection_list_2' => $selection_list_2
            )
        );
    }

    public function auth(Request $request){
        $validation = Validator::make($request->all(), [
            'email' => ['required','email'],
            'passwd' => ['required','min:6'],
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $auth_data = array(
            'email' => $request->email,
            'password' => $request->passwd
        );

        if(Auth::attempt($auth_data)){
            return redirect()->route('index');
        } else {
            return back()->withErrors(["login", "Usuário e/ou senha incorretos. Por favor, tente novamente."]);
        }

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => ['required','max:255'],
            'email' => ['required','email'],
            'passwd' => ['required','min:6'],
            'passwd_confirm' => ['required','same:passwd']
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $user = new User();

        $user->create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->passwd),
            'photo' => 'storage/profile_img/generic-avatar.png',
        ]);

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
