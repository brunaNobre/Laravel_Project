<?php

namespace App\Http\Controllers;

use App\Proposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Carro;


class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // verifica se (não) está autenticado
        if (!Auth::check()) {
            return redirect('/');
        }
        $propostas = Proposta::orderBy('id', 'desc')->paginate(3);
        return view('admin.propostas_list', compact('propostas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|min:2|max:200',
            'email' => 'required',
            'telefone' => 'min:9|max:40'
        ]);


        $inc = Proposta::insert([
            'nome_cliente' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'proposta' => $request->proposta,
            'carro_id' => $request->id
            ]);

        if ($inc) {
            return redirect()->route('index')
                ->with('status', 'Proposta incluída!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proposta  $proposta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carro = Carro::find($id);

        return view('comercial.proposta', compact('carro'));
    }

    public function responder()
    {


        return view('admin.resposta');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proposta  $proposta
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposta $proposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proposta  $proposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposta $proposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proposta  $proposta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposta $proposta)
    {
        //
    }
}
