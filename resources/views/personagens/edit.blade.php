<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar') }}
        </h2>
    </x-slot>

    <section class="edit-form">
        <div class="form-container">
            <form method="POST" action="{{ route('personagens.update', $personagem->id) }}">
                @csrf
                @method('PATCH') 

                
                <div class="form-group">
                    <label class="form-label" for="nome">Nome:</label>
                    <input 
                        type="text" 
                        id="nome" 
                        name="nome" 
                        value="{{ old('nome', $personagem->nome) }}" 
                        class="form-input" 
                        required>
                </div>

              
                <div class="form-group">
                    <label class="form-label" for="descricao">Descrição:</label>
                    <textarea 
                        id="descricao" 
                        name="descricao" 
                        class="form-textarea" 
                        required>{{ old('descricao', $personagem->descricao) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="habilidade_id">Habilidade:</label>
                    <select 
                        name="habilidade_id" 
                        id="habilidade_id" 
                        class="form-select"
                        required>
                        <option value="">Selecione uma habilidade</option>
                        @foreach($habilidades as $habilidade)
                            <option value="{{ $habilidade->id }}" 
                                    {{ old('habilidade_id', $personagem->habilidade_id) == $habilidade->id ? 'selected' : '' }}>
                                {{ $habilidade->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

          
                <div class="form-group">
                    <label class="form-label" for="classe_id">Classe:</label>
                    <select 
                        name="classe_id" 
                        id="classe_id" 
                        class="form-select" 
                        required>
                        <option value="">Selecione uma classe</option>
                        @foreach($classes as $classe)
                            <option value="{{ $classe->id }}" 
                                    {{ old('classe_id', $personagem->classe_id) == $classe->id ? 'selected' : '' }}>
                                {{ $classe->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

          
                <div class="form-actions">
                    <button type="submit" class="btn-primary">Salvar</button>
                    <a href="{{ route('personagens.index') }}" class="btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
