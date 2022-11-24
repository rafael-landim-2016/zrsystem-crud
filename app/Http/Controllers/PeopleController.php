<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Http\Requests\PeopleRequest;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
// ESTA FUNÇÃO RETORNA TODAS AS PESSOAS CADASTRADAS
        return People::get();
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
    public function store(PeopleRequest $request)
    {
// AQUI INSERIMOS UMA PESSOA NO BANCO DE DADOS
        $data_insert = $request->all();
        unset($data_insert['_method']);
        unset($data_insert['id']);
        return People::insert($data_insert);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
// ESTÁ FUNÇÃO RETORNA OS DETALHES DE UMA PESSOA COM BASE NO ID PASSADO
        return People::findOrFail($id);
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
    public function update(PeopleRequest $request, $id)
    {
// AQUI ATUALIZAMOS UMA PESSOA NO BANCO DE DADOS
        $data_update = $request->all();
        unset($data_update['_method']);
        return People::where('id', $id)->update($data_update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
// AQUI DELETAMOS UM DADO DO BANCO DE DADOS
        return People::where('id', $id)->delete();
    }
}
