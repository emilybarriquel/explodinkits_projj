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
                    <th>Forca</th>
                    <th>Agilidade</th>
                    <th>Inteligencia</th>


                </tr>
            </thead>
            <tbody>
            <form action="{{ route('classes.index') }}" method="GET" class="mb-4">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ request()->get('search') }}">
            <button type="submit" class="btn btn-success">Buscar</button>
        </form>
                @foreach ($classes as $classes)
                    <tr>
                        <td class="colunas">{{ $classes->id }}</td>
                        <td id="nome">{{ $classes->nome }}</td>
                        <td id="descricao">{{ $classes->descricao }}</td>
                        <td id="forca">{{ $classes->forca }}</td>
                        <td id="agilidade">{{ $classes->agilidade }}</td>
                        <td id="inteligencia">{{ $classes->inteligencia }}</td>
                        <td>
                            <a href="{{ route('classes.show', $classes->id) }}" class="btn btn-info">Detalhes</a>
                            <a href="{{ route('classes.edit', $classes->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('classes.destroy', $classes->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        {{-- {{ $classes->links() }} --}}
        <a href="{{ route('classes.create') }}" class="btn btn-primary">Nova Classe</a>
    </div>
    

</x-app-layout>
