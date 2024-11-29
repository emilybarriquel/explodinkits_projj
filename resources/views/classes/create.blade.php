<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
        <title>Nova Classe</title>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Criar Classes') }}
        </h2>
    </x-slot>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Sucesso!</strong>
            <span class="block sm:inline">{{ session('success') }}</div>
        </div>
    @endif
    <body>
        <div class="container">
            <form action="{{ route('classes.store') }}" method="POST">
                <!-- Token CSRF para proteção contra ataques CSRF -->
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" cols="69" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="forca">Força:</label>
                    <input type="number" name="forca" min="1" max="10" required>
                </div>
                <div class="form-group">
                    <label for="agilidade">Agilidade:</label>
                    <input type="number" name="agilidade" min="1" max="10" required>
                </div>
                <div class="form-group">
                    <label for="inteligencia">Inteligência:</label>
                    <input type="number" name="inteligencia" min="1" max="10" required>
                </div>
                
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('classes.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </body>
</x-app-layout>
