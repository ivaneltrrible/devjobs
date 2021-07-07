<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vacante;
use App\Models\Candidato;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //Validacion del formulario
        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000',
            'vacante_id' => 'required'
        ]);

        //Almacenar documento PDF 
        if($request->file('cv'))
        {
            $archivo = $request->file('cv');
            $nombreArchivo = time() . "." . $request->file('cv')->extension();
            $ubicacion = public_path('/storage/cv');
            $archivo->move($ubicacion, $nombreArchivo);
        }

        //otra manera de almacenar en la BD por relacion ============================================== 
            $vacante = Vacante::find($data['vacante_id']);
            $vacante->candidatos()->create([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'cv' => $nombreArchivo,
            ]); 

            $delay = Carbon::now()->addSeconds(20);
            //dd($delay);
            $reclutador = $vacante->reclutador;
            $reclutador->notify(( new NuevoCandidato($vacante->titulo))->delay($delay));


        //$candidato = new Candidato($data);
        //$candidato->cv = "123.pdf";
        //$candidato->save(); //Se guarda en la BD

        return back()->with('estadoCV', 'Tus datos se enviaron correctamente mucha suerte');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
