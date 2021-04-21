@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-center text-2xl mt-10">Crea una nueva vacante</h1>
    
    {{--/**************************************************************/
                /* FORMULARIO DE CREAR VACANTE */
    /**************************************************************/--}}
    <form action="#" class="max-w-lg my-10 mx-auto">
        {{-----------------------------NOTE  INPUT DE TITULO  ----------------------}}
        <div class="mb-5">
            <label for="titulo" class="text-gray-700 text-sm block mb-2">Titulo: </label>
            <input id="titulo" type="text" class="p-3 bg-white rounded form-input w-full @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" autofocus>
        </div>
        {{-----------------------------NOTE  SELECT DE CATEGORIAS  ----------------------}}
        <div class="mb-5">
            <label for="categoria" class="text-gray-700 text-sm block mb-2">Categoria: </label>
            <select name="categoria" id="categoria" class="w-full block p-3 rounded focus:outline-none border border-gray-200 text-gray-700 leading-tight focus:bg-white focus:border-gray-500 bg-gray-100">
                <option value="" selected disabled>-- Seleccione una opcion --</option>
                @foreach ($categorias as $categoria )
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        {{-----------------------------NOTE  SELECT DE EXPERIENCIAS  ----------------------}}
        <div class="mb-5">
            <label for="experiencia" class="text-gray-700 text-sm block mb-2">Experiencia: </label>
            <select name="experiencia" id="experiencia" class="w-full block p-3 rounded focus:outline-none border border-gray-200 text-gray-700 leading-tight focus:bg-white focus:border-gray-500 bg-gray-100">
                <option value="" selected disabled>-- Seleccione una opcion --</option>
                @foreach ($experiencias as $experiencia )
                    <option value="{{ $experiencia->id }}">{{ $experiencia->nombre }}</option>
                @endforeach
            </select>
        </div>
        {{-----------------------------NOTE  SELECT DE UBICACIONES  ----------------------}}
        <div class="mb-5">
            <label for="ubicacion" class="text-gray-700 text-sm block mb-2">Ubicacion: </label>
            <select name="ubicacion" id="ubicacion" class="w-full block p-3 rounded focus:outline-none border border-gray-200 text-gray-700 leading-tight focus:bg-white focus:border-gray-500 bg-gray-100">
                <option value="" selected disabled>-- Seleccione una opcion --</option>
                @foreach ($ubicaciones as $ubicacion )
                    <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>
                @endforeach
            </select>
        </div>
        {{-----------------------------NOTE  SELECT DE SALARIOS  ----------------------}}
        <div class="mb-5">
            <label for="salario" class="text-gray-700 text-sm block mb-2">Salario: </label>
            <select name="salario" id="salario" class="w-full block p-3 rounded focus:outline-none border border-gray-200 text-gray-700 leading-tight focus:bg-white focus:border-gray-500 bg-gray-100">
                <option value="" selected disabled>-- Seleccione una opcion --</option>
                @foreach ($salarios as $salario )
                    <option value="{{ $salario->id }}">{{ $salario->nombre }}</option>
                @endforeach
            </select>
        </div>
        {{-----------------------------NOTE  MEDIUM EDITOR DESCRIPTION  ----------------------}}
        <div class="mb-5">
            <label for="editor" class="text-gray-700 text-sm block mb-2">Descripcion de Vacante</label>

            <div class="editable">

            </div>
        </div>

        {{-----------------------------NOTE  BOTON DE PUBLICAR VACANTE  ----------------------}}
        <button 
            type="submit"
            class="bg-teal-500 hover:bg-teal-600 uppercase p-3 w-full font-bold text-gray-100 focus:outline focus:shadow-outline">
            Publicar Vacante
        </button>
    </form>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>

    //Funciones 
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons 
                }
            });
        })
    </script>
@endsection