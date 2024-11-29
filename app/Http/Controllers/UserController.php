<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
        $request->validate([
            'nome' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|min:8',
        ], );

        $user = new User([
            'name' => $request->input('nome'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('senha')), //bitcoin
        ]);

        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);

       
        $request->validate([
            'nome' => 'required|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        ], $mensagens);

        $usuario->update([
            'name' => $request->input('nome'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
