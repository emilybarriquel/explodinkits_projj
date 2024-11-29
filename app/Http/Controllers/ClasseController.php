<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    public function index(Request $request)
    {
        //pesquisa
        $query = Classe::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nome', 'like', "%$search%")
                  ->orWhere('descricao', 'like', "%$search%");
        }

        $classes = $query->get();

        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100|unique:classes,nome',
            'descricao' => 'nullable|string|max:800',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.unique' => 'Já existe uma classe com esse nome.',
            'descricao.max' => 'A descrição não pode ter mais de 800 caracteres.',
        ]);

        Classe::create($request->all());

        return redirect()->route('classes.index')->with('success', 'Classe criada com sucesso!');
    }

    public function show($id)
    {
        $classes = Classe::findOrFail($id);
        return view('classes.show', compact('classes'));
    }

    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classes.edit', compact('classe'));
    }

    public function update(Request $request, $id)
    {
        $classes = Classe::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'string|max:800',
        ]);

        $classes->update($request->only(['nome', 'descricao', 'forca', 'agilidade', 'inteligencia']));

        return redirect()->route('classes.index')->with('success', 'Classe atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $classes = Classe::findOrFail($id);
        $classes->delete();

        return redirect()->route('classes.index')->with('success', 'Classe excluída com sucesso!');
    }
}
