<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{
    //Method Contruct
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Consultas
        $categorias = Categoria::all();
        $experiencias = Experiencia::all(); 
        $ubicaciones = Ubicacion::all(); 
        $salarios = Salario::all(); 


        return view('vacantes.create', compact('categorias', 'experiencias', 'ubicaciones', 'salarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar lo que se ingresa en el formato
        $data = $request->validate([
            'titulo' => 'required|min:8',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salarios' => 'required',
            'descripcion' => 'required|min:100',
            'imagen' => 'required',
            'skills' => 'required',
            
        ]);
        return 'desde store';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        //
        return 'Hola desde mostrar';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        //
        
    }

    //SECTION SUBIR IMAGENES CON DROPZONE
    public function imagen(Request $request)
    {   
        $imagen = $request->file('file');  // Obtener imagen del front
        $nombreImagen = time() . '.' . $imagen->extension(); //Cambiar el nombre de la img a la hora que se subio

        $imagen->move(public_path('storage/vacantes'), $nombreImagen); //se mueve la nueva imagen a esta ubicacion
        return response()->json(['correcto' => $nombreImagen]); // se retorna en respuesta al front en formato json el nombre de la imagen

    }
    public function borrarimagen(Request $request)
    {
        if($request->ajax()){
            $imagen = $request->get('imagen');

            if(File::exists('storage/vacantes/' . $imagen)){
                File::delete('storage/vacantes/' . $imagen);
                return response('Imagen eliminada', 200);
                
            }
            
        }
    }
}
