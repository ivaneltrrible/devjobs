@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-20 text-center">
        <div class="text-2xl mb-5">{{ __('Verify Email Address') }}</div>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="w-full text-gray-100 bg-teal-600 hover:bg-teal-700 px-6 py-4 max-w-sm rounded mt-8 uppercase focus:outline-none focus:shadow-outline">{{ __('click here to request another') }}</button>
        </form>             
        <img src="{{ url('/images/email.png') }}" alt="Email" style="width: 10rem" class="w-full inline">
    </div>
@endsection
