@extends('layouts.app')

@section('styles')
    {{--  LINK DE MEDIUM EDITOR  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
    {{--  LINK DE DROPZONE  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />
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
            <label for="descripcion" class="text-gray-700 text-sm block mb-2">Descripcion de Vacante:</label>

            <div class="editable form-input w-full bg-gray-100 text-gray-700 p-3 rounded">
            </div>
            <input type="hidden" name="descripcion" id="descripcion" value="">
        </div>
        {{-----------------------------NOTE  DROPZONE  ----------------------}}
        <div class="mb-5">
            <label for="descripcion" class="text-gray-700 text-sm block mb-2">Imagen de Vacante:</label>

            <div id="dropzoneDevJobs" class="dropzone bg-gray-100 rounded">
            </div>
            <p id="alertaDropZone"></p>

            <input type="hidden" name="imagen" id="imagen" value="">
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
    {{--  LINK DE MEDIUM-EDITOR  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
    {{--  LINK DE DROPZONE  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js" integrity="sha512-llCHNP2CQS+o3EUK2QFehPlOngm8Oa7vkvdUpEFN71dVOf3yAj9yMoPdS5aYRTy8AEdVtqUBIsVThzUSggT0LQ==" crossorigin="anonymous"></script>

    {{-- NOTE: Funciones  --}}
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {
            //Para retirar el error de que busque siempre el elemento automaticamente de dropzone
            

            //SECTION MEDIUM-EDITOR //////////////////////////////
            // Se crea el objeto de editor para inicializar funciones 
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons : ['bold', 'italic', 'underline', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedList', 'unorderedList', 'h2', 'h3'],
                    static : true,
                    sticky : true,
                },
                placeholder : {
                    text : 'Informacion de la vacante',
                }
            });
            
            //Se obtiene el contenido del editor para mandar a la base de datos
            editor.subscribe('editableInput' , function (eventObj, editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })

            //SECTION DROPZONE ///////////////////////////////
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen",
                dictFileTooBig: 'La imagen no puede pesar mas de 2Mb',
                maxFilesize: 2,
                addRemoveLinks: true,
                dictRemoveFile: 'Quitar imagen',
                dictDefaultMessage: 'Subir imagen de la vacante',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                success: function (file, response){
                    console.log(response);
                    document.querySelector('#alertaDropZone').textContent = ''; 

                    //Se agrega al value la respuesta del servidor (ruta-imagen) en el input hidden
                    document.querySelector('#imagen').value = response.correcto;
                    //NOTE: add attribute for file parameter and access to axios element
                    file.nombreServidor = response.correcto;
                },
                error: function (file, response){
                    console.log(file);
                    console.log(response);
                    document.querySelector('#alertaDropZone').textContent = response;
                },
                maxfilesexceeded: function (file){
                    if( this.files[1] != null){
                        this.removeFile(this.files[0]);
                        this.addFile(file);
                    }
                },
                removedfile: function (file, response){
                    console.log('Fue eliminado el archivo: ', file.nombreServidor);

                    //NOTE: peticion for axios to delete image in dropzone
                    params = {

                    }
                    axios('vacantes/borrarimagen', )
                }
            });
            
        })
    </script>
@endsection