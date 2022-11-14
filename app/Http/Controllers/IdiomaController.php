<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idioma;

class IdiomaController extends Controller
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
        $listaidiomas = Idioma::all();
        return view('idiomas.index', ['idiomas' => $listaidiomas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('idiomas.create');
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

        Idioma::create($request->all());
        return redirect()->route('idiomas.index');
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
    public function edit(Idioma $idioma)
    {
        return view('idiomas.edit', ['idioma' => $idioma]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idioma $idioma)
    {
        $request->validate(
            ['descripcion' => 'required|min:3|max:100|unique:lib_idioma']
        );

        $idioma->update($request->all());
        return redirect()->route('idiomas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idioma $idioma)
    {
        $sexo->delete();
        return redirect()->route('idiomas.index');   
    }
}
