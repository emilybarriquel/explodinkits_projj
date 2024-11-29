<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
        <title>Novo Personagem</title>
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Criar Personagem') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Sucesso!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <body>
        <div class="container">
            <form action="{{ route('personagens.store') }}" method="POST">
               
                @csrf

              
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>

                
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control" cols="69" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="habilidade_id">Habilidade:</label>
                    <select name="habilidade_id" required>
                        <option value="" disabled selected>Escolha uma habilidade</option>
                        @foreach($habilidades as $habilidade)
                            <option value="{{ $habilidade->id }}">{{ $habilidade->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="classe_id">Classe:</label>
                    <select name="classe_id" required>
                        <option value="" disabled selected>Selecione uma classe</option>
                        @foreach($classes as $classe)
                            <option value="{{ $classe->id }}">{{ $classe->nome }}</option>
                        @endforeach
                    </select>
                </div>

                
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ route('personagens.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </body>
</x-app-layout>
