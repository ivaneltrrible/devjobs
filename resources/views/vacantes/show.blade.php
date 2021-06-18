@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <h1 class="mt-10 text-3xl text-center">{{ $vacante->titulo }}</h1>

    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5">
            <p class="text-gray-700 block my-2 font-bold">
                Publicado: <span class="font-normal">{{ $vacante->created_at->diffForHumans() }}</span>
                Por: <span class="font-normal">{{ $vacante->reclutador->name }}</span>
            </p>
            <p class="text-gray-700 block my-2 font-bold">
                Categoria: <span class="font-normal">{{ $vacante->categoria->nombre }}</span>
            </p>
            <p class="text-gray-700 block my-2 font-bold">
                Salario: <span class="font-normal">{{ $vacante->salario->nombre }}</span>
            </p>
            <p class="text-gray-700 block my-2 font-bold">
                Ubicacion: <span class="font-normal">{{ $vacante->ubicacion->nombre }}</span>
            </p>
            <p class="text-gray-700 block my-2 font-bold">
                Experiencia: <span class="font-normal">{{ $vacante->experiencia->nombre }}</span>
            </p>
            <h2 class="text-gray-700 text-center mt-10 text-2xl mb-6">Conocimientos y Tecnologia</h2>
            @php
                $arraySkills = explode(",",$vacante->skills)

            @endphp
            @foreach ($arraySkills as $skill)
                <p class="text-gray-700 inline-block my-2 border border-gray-500 rounded py-2 px-8">
                    {{ $skill }}
                </p>
            @endforeach
            <a href="/storage/vacantes/{{ $vacante->imagen }}" data-lightbox="img-1" data-title="{{ $vacante->titulo}}">
                <img src="/storage/vacantes/{{ $vacante->imagen }}" alt="Imagen de Vacante" class="w-50 mt-10">
            </a>
            <div class="descripcion mt-10 mb-5">
                {!! $vacante->descripcion !!}
            </div>
        </div>
        <div class="md:w-2/5 bg-teal-500 rounded m-3 p-5">
            <h2 class="text-center text-2xl text-white uppercase font-bold my-5">Contacta al Reclutador</h2>

            <form action="">
                
            </form>
        </div>
    </div>
@endsection