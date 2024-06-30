<?php

namespace App\Http\Controllers;

use App\Models\Participacao;
use App\Models\Pessoa;
use App\Models\Evento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class ParticipacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participacoes = Participacao::all();
        return view('participacoes.index', compact('participacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = Pessoa::all();
        $eventos = Evento::all();
        return view('participacoes.form', compact('pessoas', 'eventos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pessoa_id' => 'required|exists:pessoas,id',
            'evento_id' => 'required|exists:eventos,id',
            ]);
    
        // Se passar na validação, criar a participação
        $participacao = Participacao::create([
            'pessoa_id' => $request->pessoa_id,
            'evento_id' => $request->evento_id,
        ]);
    
        return redirect()->route('participacoes.index')->with('success', 'Participação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participacao  $participacao
     * @return \Illuminate\Http\Response
     */
    public function show(Participacao $participacao)
    {
        return view('participacoes.show', compact('participacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participacao  $participacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Participacao $participacao)
    {
        $pessoas = Pessoa::all();
        $eventos = Evento::all();
        return view('participacoes.form', compact('participacao', 'pessoas', 'eventos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participacao  $participacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participacao $participacao)
    {
        $request->validate([
            'pessoa_id' => 'required|exists:pessoas,id',
            'evento_id' => 'required|exists:eventos,id',
        ]);

        $participacao->update([
            'pessoa_id' => $request->pessoa_id,
            'evento_id' => $request->evento_id,
        ]);

        return redirect()->route('participacoes.index')->with('success', 'Participação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participacao  $participacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participacao $participacao)
    {
        $participacao->delete();
        return redirect()->route('participacoes.index')->with('success', 'Participação excluída com sucesso!');
    }
}

