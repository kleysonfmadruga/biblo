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
        //
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
        //$user->name = $request->name;
        //$user->email = $request->email;
        //$user->password = Hash::make($request->passwd);
        //$user->photo = storage_path('profile_img/generic-avatar.png');
        $user->create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->passwd),
            'photo' => storage_path('profile_img/generic-avatar.png'),
        ]);

        return redirect()->route('home');
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
