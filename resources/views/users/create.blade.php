<!-- resources/views/users/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Criar Novo Usuário</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirmar Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div>
            <button type="submit">Criar Usuário</button>
        </div>
    </form>
@endsection