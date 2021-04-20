@extends('layouts.app')

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-center text-2xl mt-10">Crea una nueva vacante</h1>
    @foreach ( $categorias as $categoria )
        {{$categoria->nombre}}
    @endforeach 
    <form action="#" class="max-w-lg my-10 mx-auto">
        <div class="mb-5">
            <label for="titulo" class="text-gray-700 text-sm block mb-2">Titulo: </label>
            <input id="titulo" type="email" class="p-3 bg-white rounded form-input w-full @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" autofocus>
        </div>
        <div class="mb-5">
            <label for="categoria" class="text-gray-700 text-sm block mb-2">Categoria: </label>
            <select name="categoria" id="categoria" class="w-full block p-3 rounded focus:outline-none border border-gray-200 text-gray-700 leading-tight focus:bg-white focus:border-gray-500 bg-gray-100">
                <option value="" selected disabled>-- Seleccione una opcion --</option>
                @foreach ($categorias as $categoria )
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button 
            class="bg-teal-500 hover:bg-teal-600 uppercase p-3 w-full font-bold text-gray-100 focus:outline focus:shadow-outline">
            Publicar Vacante
        </button>
    </form>
@endsection