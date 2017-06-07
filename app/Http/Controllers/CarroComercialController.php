<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carro;
use App\Marca;

class CarroComercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Carro::all();

        return view('comercial.index', compact('carros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pesq() {


        $carros = Carro::paginate(3);

        return view('comercial.carros_pesquisa', compact('carros'));
    }

    public function filtros(Request $request) {
        $modelo = $request->modelo;
        $precomax = $request->precomax;

        $filtro = array();

        if (!empty($modelo)) {
            array_push($filtro, array('modelo','like', '%'.$modelo.'%'));
        }

        if (!empty($precomax)) {
            array_push($filtro, array('preco','<=', $precomax));
        }

        $carros = Carro::where($filtro)
            ->orderBy('modelo')
            ->paginate(3);

        return view('comercial.carros_pesquisa', compact('carros'));
    }
}
