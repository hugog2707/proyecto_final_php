<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sexo;

class SexoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listasexos = Sexo::all();
        return view('sexos.index', ['sexos' => $listasexos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sexos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            ['descripcion' => 'required|min:3|max:100|unique:lib_sexo']
        );

        Sexo::create($request->all());
        return redirect()->route('sexos.index');
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
     * @param  Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function edit(Sexo $sexo)
    {
        return view('sexos.edit', ['sexo' => $sexo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sexo $sexo)
    {
        $request->validate(
            ['descripcion' => 'required|min:3|max:100|unique:lib_sexo']
        );

        $sexo->update($request->all());
        return redirect()->route('sexos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sexo $sexo)
    {
        $sexo->delete();
        return redirect()->route('sexos.index');   
    }
}
