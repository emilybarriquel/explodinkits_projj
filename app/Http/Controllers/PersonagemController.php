<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem;
use App\Models\Habilidade;
use App\Models\Classe;

class PersonagemController extends Controller
{
    public function index(Request $request)
    {
        //searsh
        $query = Personagem::with(['habilidade', 'classe']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nome', 'like', "%$search%")
                  ->orWhere('descricao', 'like', "%$search%")
                  ->orWhereHas('habilidade', function($q) use ($search) {
                      $q->where('nome', 'like', "%$search%");
                  })
                  ->orWhereHas('classe', function($q) use ($search) {
                      $q->where('nome', 'like', "%$search%");
                  });
        }

        $personagens = $query->get();

        return view('personagens.index', compact('personagens'));
    }

    public function create()
    {
        $habilidades = Habilidade::all(); 
        $classes = Classe::all();

        return view('personagens.create', compact('habilidades', 'classes'));
    }


    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'nome' => 'required|unique:personagens,nome',
            'descricao' => 'required',
            'habilidade_id' => 'required|exists:habilidades,id',
            'classe_id' => 'required|exists:classes,id',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.unique' => 'Já existe um personagem com esse nome.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'habilidade_id.required' => 'A habilidade é obrigatória.',
            'classe_id.required' => 'A classe é obrigatória.',
        ]);

        Personagem::create($request->all());

        return redirect()->route('personagens.index')->with('success', 'Personagem criado com sucesso!');
    }

    public function show($id)
    {
        $personagem = Personagem::with(['habilidade', 'classe'])->findOrFail($id);

        return view('personagens.show', compact('personagem'));
    }

    public function edit($id)
    {
        $personagem = Personagem::findOrFail($id);
        $habilidades = Habilidade::all();
        $classes = Classe::all();

        return view('personagens.edit', compact('personagem', 'habilidades', 'classes'));
    }

    public function update(Request $request, $id)
    {
        // Validate
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'habilidade_id' => 'required|exists:habilidades,id',
            'classe_id' => 'required|exists:classes,id',
        ]);

        $personagem = Personagem::findOrFail($id);
        $personagem->update($request->all());

        return redirect()->route('personagens.index')->with('success', 'Personagem atualizado com sucesso!');
    }

    // removeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
    public function destroy($id)
    {
        $personagem = Personagem::findOrFail($id);
        $personagem->delete();

        return redirect()->route('personagens.index')->with('success', 'Personagem removido com sucesso!');
    }
}
