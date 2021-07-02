<aside class="md:w-2/5 bg-teal-500 rounded m-3 p-5">
    <h2 class="text-center text-2xl text-white uppercase font-bold my-5">Contacta al Reclutador</h2>

    <form enctype="multipart/form-data" action="{{ route('candidatos.store') }}" method="POST" novalidate>
        @csrf
        <div class="mb-4">
            <label for="" class="text-white block font-bold mb-4 text-sm">Nombre: </label>
            <input type="text"
                    id="nombre"
                    class="rounded bg-gray-100 p-3 form-input w-full @error('nombre')
                        border border-red-500
                    @enderror"
                    placeholder="Tu nombre"
                    name="nombre"
                    value="{{ old('nombre') }}"
            >
            @error('nombre')
                <div class="bg-red-100 text-red-700 w-full p-4 mt-5 border-red-500 border-l-4">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="text-white block font-bold mb-4 text-sm">Email: </label>
            <input type="email"
                    id="email"
                    class="rounded bg-gray-100 p-3 form-input w-full @error('email')
                        border border-red-500
                    @enderror"
                    placeholder="Tu email"
                    name="email"
                    value="{{ old('email') }}"
            >
            @error('email')
                <div class="bg-red-100 text-red-700 w-full p-4 mt-5 border-red-500 border-l-4">
                    <p>{{ $message }}</p>
                </div>
            @enderror
        </div>
        {{--********************************  DIV DE CURRICULUM SOLO ACEPTA PDF  **************************--}}
        <div class="mb-4">
            <label for="" class="text-white block font-bold mb-4 text-sm"> Curriculum (PDF): </label>
            <input type="file"
                    id="cv"
                    class="rounded bg-gray-100 p-3 form-input w-full @error('cv')
                        border border-red-500
                    @enderror"
                    name="cv"
                    accept="application/pdf"
                    
            >
            @error('cv')
                <div class="bg-red-100 text-red-700 w-full p-4 mt-5 border-red-500 border-l-4">
                    <p>{{ $message }}</p>
                </div>
            @enderror

        </div>
        <input type="hidden" name="vacante_id" value="{{ $vacante->id }}">
        <input type="submit" class="bg-teal-600 hover:bg-teal-700 w-full text-gray-100 focus:outline-none py-3 focus:shadow-outline uppercase" value="Contactar"></input>
    </form>
</aside>