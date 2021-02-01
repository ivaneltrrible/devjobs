@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center">
        <div class="w-full max-w-sm">
            <div class="flex flex-col break-words bg-white border-2 shadow-xl mt-20">
                <div class="bg-gray-800 text-gray-100 uppercase text-center py-3 px-6 mb-0">
                    {{ __('Login') }}
                </div>    
                    <form method="POST" action="{{ route('login') }}" class="py-10 px-3" novalidate>
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="text-gray-700 text-sm block mb-2">{{ __('E-Mail Address') }}</label>
                            <div class="relative w-full">
                                <input id="email" type="email" class="p-3 bg-gray-200 rounded form-input w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                                    <img src="{{ url('images/email.svg') }}" alt="Imagen de email" class="w-5 h-5">
                                </span>
                            </div>
                            

                            @error('email')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-3 w-full mt-4" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-5">
                            <label for="password" class="block text-gray-700 mb-2 text-sm">{{ __('Password') }}</label>
                                <div class="relative w-full">
                                    <input id="password" type="password" class="form-input w-full rounded bg-gray-200 p-3 @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                                        <img src="{{ url('images/view.svg') }}" alt="Imagen de view" class="w-5 h-5" id="view" title="Ver password">
                                    </span>
                                </div>
                                

                                @error('password')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-3 w-full mt-4" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="text-sm text-gray-700 mb-2 block" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-gray-100 focus:outline-none focus:shadow-outline uppercase py-4">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="mt-4 text-center w-full text-sm text-gray-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
