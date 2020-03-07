<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UsuariosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listaUsuarios');
    }

    public function indexJson()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.github.com/search/users?q=carlosguttemberg');
        return $response->getBody();
    }

    public function pesquisar(Request $request)
    {
        $q = "";

        if($request->nomeUsuario){
            $q = 'q=' . $request->nomeUsuario;
        }

        if($request->linguagem){
            if (trim($q) == "") {
                $q = 'q=' . $request->linguagem;
            } else {
                $q .= "&language:" . $request->linguagem;
            }
            
        }

        $client = new Client();
        $response = $client->request('GET', 'https://api.github.com/search/users?' . $q);

        return $response->getBody();
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
}
