<?php

namespace App\Http\Controllers;

use App\Models\Aldeia;
use Illuminate\Http\Request;

class AldeiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $aldeias = Aldeia::all();

        return $aldeias;
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
    public function store(Request $request){
        $aldeia = Aldeia::create($request->all());

        return $aldeia;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $aldeia = Aldeia::find($id);
        
        return $aldeia;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function edit(Aldeia $aldeia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $aldeia = Aldeia::find($id);
        
        $aldeia->update($request->all());
        return $aldeia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $aldeia = Aldeia::find($id);
        
        $aldeia->delete();
        return ["msg => aldeia removida com sucesso"];
    }
}