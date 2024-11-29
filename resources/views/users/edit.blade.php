<!-- resources/views/users/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Usuário</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password_confirmation">Confirmar Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <div>
            <button type="submit">Atualizar Usuário</button>
        </div>
    </form>
@endsection
