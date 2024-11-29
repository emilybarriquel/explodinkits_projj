<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>
    <div class="container">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Habilidade</th>
                    <th>Classe</th>


                </tr>
            </thead>
            <tbody>
            <form action="{{ route('personagens.index') }}" method="GET" class="mb-4">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ request()->get('search') }}">
            <button type="submit" class="btn btn-success">Buscar</button>
        </form>
                @foreach ($personagens as $personagens)
                    <tr>
                        <td class="colunas">{{ $personagens->id }}</td>
                        <td id="nome">{{ $personagens->nome }}</td>
                        <td id="descricao">{{ $personagens->descricao }}</td>
                        <td id="habilidade">{{ $personagens->habilidade->nome ?? 'Sem habilidade' }}</td>
                        <td id="classe">{{ $personagens->classe->nome ?? 'Sem classe' }}</td>
                        <td>
                            <a href="{{ route('personagens.show', $personagens->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('personagens.edit', $personagens->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('personagens.destroy', $personagens->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $personagens->links() }} --}}
        <a href="{{ route('personagens.create') }}" class="btn btn-primary">Novo Personagem</a>

    </div>
</x-app-layout>
