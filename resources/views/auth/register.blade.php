@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-screen-md">
    <div class="flex flex-wrap justify-center">
        <div class="md:w-1/2 md:order-1 order-2">
            <div class="w-full max-w-sm">
                <div class="flex flex-wrap flex-col bg-white border-2 shadow-xl mt-10 md:mt-20 ">
                        <div class="py-3 px-6 text-gray-100 bg-gray-800 uppercase text-center">
                            {{ __('Register') }}
                        </div>
                        <form method="POST" action="{{ route('register') }}" class="py-10 px-3" novalidate>
                            @csrf
    
                            <div class="flex flex-wrap mb-6">
                                <label for="name" class="block text-gray-700 text-sm mb-2">{{ __('Name') }}
                                    
                                </label>
                                <input id="name" type="text" class="form-input rounded bg-gray-200 w-full p-3 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                @error('name')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-3 w-full mt-4" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="flex flex-wrap mb-6">
                                <label for="email" class="block text-gray-700 text-sm mb-2">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-input rounded p-3 bg-gray-200 w-full  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-3 w-full mt-4" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="flex flex-wrap mb-6">
                                <label for="password" class="block text-gray-700 text-sm mb-2">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-input rounded bg-gray-200 w-full p-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-3 w-full mt-4" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="flex flex-wrap mb-6">
                                <label for="password-confirm" class="block text-gray-700 text-sm mb-2">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-input rounded bg-gray-200 w-full p-3" name="password_confirmation" required autocomplete="new-password">
                            </div>
    
                            <div class="form-group row mb-0">
                                <button type="submit" class="w-full block text-gray-100 bg-teal-600 hover:bg-teal-700 px-6 py-4">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <div class="md:w-1/2 md:order-2 order-1 flex flex-col justify-center text-center md:mt-0 mt-5 px-10">
            <h1 class="text-teal-500 text-3xl">¿Eres Reclutador?</h1>
            <p class="text-xl mt-4 text-gray-700 leading-7">Crear una cuenta totalmente gratis y comienza a publicar hasta 10 vacantes</p>
        </div>
    </div>
</div>
@endsection
