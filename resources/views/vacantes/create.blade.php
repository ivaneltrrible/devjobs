@extends('layouts.app')

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-center text-2xl mt-10">Crea una nueva vacante</h1>

    <form action="#" class="max-w-lg my-10 mx-auto">
        <div class="mb-5">
            <label for="titulo" class="text-gray-700 text-sm block mb-2">Titulo: </label>
            <input id="titulo" type="email" class="p-3 bg-white rounded form-input w-full @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" autofocus>
        </div>
        <button 
            class="bg-teal-500 hover:bg-teal-600 uppercase p-3 w-full font-bold text-gray-100 focus:outline focus:shadow-outline">
            Publicar Vacante
        </button>
    </form>
@endsection