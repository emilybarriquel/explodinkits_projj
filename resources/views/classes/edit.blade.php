<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Classe') }}
        </h2>
    </x-slot>
    <section class="edit-form">
        <div class="form-container">
            <form method="POST" action="{{ route('classes.update', $classe->id) }}">
                @csrf
                @method('PATCH') {{--edição --}}

                <div class="form-group">
                    <label class="form-label" for="nome">Nome:</label>
                    <input 
                        type="text" 
                        id="nome" 
                        name="nome" 
                        value="{{ old('nome', $classe->nome) }}" 
                        class="form-input" 
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="descricao">Descrição:</label>
                    <textarea 
                        id="descricao" 
                        name="descricao" 
                        class="form-textarea" 
                        required>{{ old('descricao', $classe->descricao) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="forca">Força:</label>
                    <input 
                        type="number" 
                        id="forca" 
                        name="forca" 
                        value="{{ old('forca', $classe->forca) }}" 
                        class="form-input" 
                        min="1" 
                        max="100" 
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="agilidade">Agilidade:</label>
                    <input 
                        type="number" 
                        id="agilidade" 
                        name="agilidade" 
                        value="{{ old('agilidade', $classe->agilidade) }}" 
                        class="form-input" 
                        min="1" 
                        max="100" 
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="inteligencia">Inteligência:</label>
                    <input 
                        type="number" 
                        id="inteligencia" 
                        name="inteligencia" 
                        value="{{ old('inteligencia', $classe->inteligencia) }}" 
                        class="form-input" 
                        min="1" 
                        max="100" 
                        required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Salvar</button>
                    <a href="{{ route('classes.index') }}" class="btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
