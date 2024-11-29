<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habilidade;

class HabilidadeController extends Controller
{
    public function index(Request $request)
    {
        //pesquisa
        $query = Habilidade::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nome', 'like', "%$search%")
                  ->orWhere('descricao', 'like', "%$search%");
        }

        $habilidades = $query->get();

        return view('habilidades.index', compact('habilidades'));
    }

    public function create()
    {
        return view('habilidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100|unique:habilidades,nome',
            'descricao' => 'nullable|string|max:800',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.unique' => 'Já existe uma habilidade com esse nome.',
            'descricao.max' => 'A descrição não pode ter mais de 800 caracteres.',
        ]);

        Habilidade::create($request->all());

        return redirect()->route('habilidades.index')->with('success', 'Habilidade criada com sucesso!');
    }

    public function show($id)
    {
        $habilidades = Habilidade::findOrFail($id);
        return view('habilidades.show', compact('habilidades'));
    }

    public function edit($id)
    {
        $habilidade = Habilidade::findOrFail($id);
        return view('habilidades.edit', compact('habilidade'));
    }

    public function update(Request $request, $id)
    {
        $habilidades = Habilidade::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'string|max:800',
        ]);

        $habilidades->update($request->only(['nome', 'descricao', 'nivel']));

        return redirect()->route('habilidades.index')->with('success', 'Habilidade atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $habilidades = Habilidade::findOrFail($id);
        $habilidades->delete();

        return redirect()->route('habilidades.index')->with('success', 'Habilidade excluída com sucesso!');
    }
}
