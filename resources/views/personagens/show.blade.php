<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Personagem') }}
        </h2>
    </x-slot>

    <section class="details">
        <div class="content">
            <div class="meta">
                <span class="label">ID:</span>
                <span class="info">{{ $personagem->id }}</span>
            </div>

            <div class="meta">
                <span class="label">Nome:</span>
                <span class="info">{{ $personagem->nome }}</span>
            </div>

            <div class="meta">
                <span class="label">Descrição:</span>
                <span class="info">{{ $personagem->descricao }}</span>
            </div>

            <div class="meta">
                <span class="label">Habilidade:</span>
                <span class="info">{{ $personagem->habilidade->nome ?? 'Nenhuma' }}</span>
            </div>

            <div class="meta">
                <span class="label">Classe:</span>
                <span class="info">{{ $personagem->classe->nome ?? 'Nenhuma' }}</span>
            </div>
        </div>

        <!-- voltar -->
        <a href="{{ route('personagens.index') }}" class="btn-return">Voltar</a>
    </section>
</x-app-layout>
