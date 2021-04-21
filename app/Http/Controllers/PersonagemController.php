<?php

namespace App\Http\Controllers;

use App\Models\Personagem;
use Illuminate\Http\Request;

class PersonagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $personagens = Personagem::all();

        return $personagens;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $personagem = Personagem::create($request->all());

        return $personagem;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Integer  $personagem
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $personagem = Personagem::find($id);
        
        return $personagem;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personagem  $personagem
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Integer $personagem
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        $personagem = Personagem::find($id);

        $personagem->update($request->all());
        return $personagem;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Integer  $personagem
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        $personagem = Personagem::find($id);
        $personagem->delete();
        
        return ["msg => personagem removido com sucesso"];
    }
}
