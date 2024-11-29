<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>
    {{-- <img src="{{ asset('img/dbz.jpg') }}" alt=""> --}}
    <div class="container">
        <br>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Nivel</th>
                    
                    
                </tr>
                
            </thead>
            <tbody>
                 <!-- pesquisa -->
        <form action="{{ route('habilidades.index') }}" method="GET" class="mb-4">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ request()->get('search') }}">
            <button type="submit" class="btn btn-success">Buscar</button>
        </form>
                @foreach ($habilidades as $habilidades)
                    <tr>
                        
                        <td class="colunas">{{ $habilidades->id }}</td>
                        <td id="nome">{{ $habilidades->nome }}</td>
                        <td id="descricao">{{ $habilidades->descricao }}</td>
                        <td id="nivel">{{ $habilidades->nivel }}</td>
                        
                        <td>
                            
                        </br></br>
                        
                            <a href="{{ route('habilidades.show', $habilidades->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('habilidades.edit', $habilidades->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('habilidades.destroy', $habilidades->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $habilidades->links() }} --}}
        <a href="{{ route('habilidades.create') }}" class="btn btn-primary">Nova Habilidade</a>

    </div>
</x-app-layout>
