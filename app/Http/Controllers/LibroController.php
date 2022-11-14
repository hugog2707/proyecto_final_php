<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Idioma;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
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
        //$libros = Autor::all();
        $libros = Libro::orderBy('cod_libro', 'ASC')->paginate(5);

        return view('libros.index', ['libros' => $libros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores  = Autor::pluck('nombres','cod_autor');
        $idioma = Idioma::all();
        return view ('libros.create',['idioma'=>$idioma, 'autores'=>$autores]);
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
            'titulo' => 'required|min:3|max:100',
            'descripcion' => 'required|min:3|max:100',
            'cod_idioma' => 'required',
            'autores' => 'required'
        ]);

        $libro = Libro::create($request->all());

        $libro->autor()->sync($request->autores);

        return redirect()->route('libros.index');
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
    public function edit(Libro $libro)
    {
        $autores  = Autor::pluck('nombres','cod_autor');
        $idioma = Idioma::all();
        return view('libros.edit', ['libro' => $libro, 'idioma' => $idioma, 'autores'=>$autores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|min:3|max:100',
            'descripcion' => 'required|min:3|max:100',
            'cod_idioma' => 'required',
            'autores' => 'required'
        ]);

        $libro->update($request->all());
        $libro->autor()->sync($request->autores);

        return redirect()->route('libros.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return back();
    }
}
