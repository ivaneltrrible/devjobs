@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center">
        <div class="w-full max-w-sm">
            <div class="flex flex-col break-words bg-white border-2 shadow-xl mt-20">
                <div class="bg-gray-800 text-gray-100 uppercase text-center py-3 px-6 mb-0">
                    {{ __('Reset Password') }}
                </div>
                    <form method="POST" action="{{ route('password.update') }}" class="py-10 px-3">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="text-gray-700 text-sm block mb-2">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="p-3 bg-gray-200 rounded form-input w-full @error('email') border-red-500 border @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-3 w-full mt-4" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="text-gray-700 text-sm block mb-2 w-full">{{ __('Password') }}</label>
                            <div class="relative w-full">
                                <input id="password" type="password" class="p-3 bg-gray-200 rounded form-input w-full @error('password') border-red-500 border @enderror" name="password" required autocomplete="new-password">
                                <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                                    <img src="{{ url('images/view.svg') }}" alt="Imagen de view" class="w-6 h-6" id="view" title="Ver password">
                                </span>
                            </div>
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password-confirm" class="text-gray-700 text-sm block mb-2">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="p-3 bg-gray-200 rounded form-input w-full" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-gray-100 focus:outline-none focus:shadow-outline uppercase py-4 rounded-md">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
