<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Sexo;
use Illuminate\Http\Request;

class AutorController extends Controller
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
        //$autores = Autor::all();
        $autores = Autor::orderBy('cod_autor', 'ASC')->paginate(5);

        return view('autores.index', ['autores' => $autores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sexos = Sexo::all();
        return view('autores.create', ['sexos' => $sexos]);
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
            'nombres' => 'required|min:3|max:100',
            'apellidos' => 'required|min:3|max:100',
            'cod_sexo' => 'required'
        ]);

        Autor::create($request->all());

        return redirect()->route('autores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        $sexos = Sexo::all();
        return view('autores.edit', ['autor' => $autor, 'sexos' => $sexos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'nombres' => 'required|min:3|max:100',
            'apellidos' => 'required|min:3|max:100',
            'cod_sexo' => 'required'
        ]);

        $autor->update($request->all());

        return redirect()->route('autores.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return back();
    }
}
