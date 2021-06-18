<?php

namespace App\Http\Controllers;

use auth;
use Carbon\Carbon;
use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\VacanteController;

class VacanteController extends Controller
{
    //Method Contruct
    /* public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtener las vacantes del usuario autentificado de dos maneras diferentes
        //NOTE: Primer manera
        //$vacantes = auth()->user()->vacantes;

        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(3);

        return view('vacantes.index', compact('vacantes'));
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
            'salario' => 'required',
            'descripcion' => 'required|min:100',
            'imagen' => 'required',
            'skills' => 'required',
            
        ]);

        //Almacenar en la BD para
        auth()->user()->vacantes()->create([
            'titulo' => $request['titulo'],
            'descripcion' => $request['descripcion'],
            'imagen' => $request['imagen'],
            'skills' => $request['skills'],            
            'experiencia_id' => $request['experiencia'],
            'categoria_id' => $request['categoria'],
            'ubicacion_id' => $request['ubicacion'],
            'salario_id' => $request['salario'],
        ]);
        return redirect()->action([VacanteController::class, 'index']);
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
        
        return view('vacantes.show', compact('vacante'));
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
