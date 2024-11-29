<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Habilidade') }}
        </h2>
    </x-slot>
    <section class="details">
      <div class="content">
        <div class="meta">
          <span class="label">ID:</span>
          <span class="info">{{ $habilidades->id }}</span>
        </div>
        <div class="meta">
          <span class="label">Nome:</span>
          <span class="info">{{ $habilidades->nome }}</span>
        </div>
        <div class="meta">
            <span class="label">Descrição:</span>
            <span class="info">{{ $habilidades->descricao }}</span>
          </div>
        <div class="meta">
            <span class="label">Nível:</span>
            <span class="info">{{ $habilidades->nivel }}</span>
          </div>
      </div>
      <a href="{{ route('habilidades.index') }}" class="btn-return">Voltar</a>
    </section>
  </x-app-layout>