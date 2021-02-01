@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center">
        <div class="w-full max-w-sm">
            <div class="flex flex-col break-words bg-white border-2 shadow-xl mt-20">
                <div class="bg-gray-800 text-gray-100 uppercase text-center py-3 px-6 mb-0">
                    {{ __('Reset Password') }}
                </div>  
                    <form method="POST" action="{{ route('password.email') }}" class="py-10 px-3" novalidate>
                        @csrf
                        @if (session('status'))
                            <div class="border-l-4 border-green-500 bg-green-100 w-full text-sm text-green-700 p-4 my-5" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="text-gray-700 text-sm block mb-2">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="p-3 bg-gray-200 rounded form-input w-full @error('email') border-red-500 border @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 text-sm p-3 w-full mt-4" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="flex flex-wrap">
                                <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-gray-100 focus:outline-none focus:shadow-outline uppercase py-4">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
