<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="">
            {{ __('Classe') }}
        </h2>
    </x-slot>
    <section class="details">
      <div class="content">
        <div class="meta">
          <span class="label">ID:</span>
          <span class="info">{{ $classes->id }}</span>
        </div>
        <div class="meta">
          <span class="label">Nome:</span>
          <span class="info">{{ $classes->nome }}</span>
        </div>
        <div class="meta">
            <span class="label">Descrição:</span>
            <span class="info">{{ $classes->descricao }}</span>
        </div>

        
        <div class="meta">
            <span class="label">Força:</span>
            <span class="info">{{ $classes->forca }}</span>
        </div>
        <div class="meta">
            <span class="label">Agilidade:</span>
            <span class="info">{{ $classes->agilidade }}</span>
        </div>
        <div class="meta">
            <span class="label">Inteligência:</span>
            <span class="info">{{ $classes->inteligencia }}</span>
        </div>
      </div>
      <a href="{{ route('classes.index') }}" class="btn-return">Voltar</a>
    </section>
</x-app-layout>
