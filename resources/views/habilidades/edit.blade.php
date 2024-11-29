<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>
    <section class="edit-form">
        <div class="form-container">
            <form method="POST" action="{{ route('habilidades.update', $habilidade->id) }}">
                @csrf
                @method('PATCH') 

                <div class="form-group">
                    <label class="form-label" for="nome">Nome:</label>
                    <input 
                        type="text" 
                        id="nome" 
                        name="nome" 
                        value="{{ old('nome', $habilidade->nome) }}" 
                        class="form-input" 
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="descricao">Descrição:</label>
                    <textarea 
                        id="descricao" 
                        name="descricao" 
                        class="form-textarea" 
                        required>{{ old('descricao', $habilidade->descricao) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="nivel">Nivel:</label>
                    <textarea 
                        id="nivel" 
                        name="nivel" 
                        class="form-textarea" 
                        required>{{ old('nivel', $habilidade->nivel) }}</textarea>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn-primary">Salvar</button>
                    <a href="{{ route('habilidades.index') }}" class="btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
