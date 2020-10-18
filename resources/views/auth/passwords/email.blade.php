@extends('layouts.app')

@section('content')
<div class="h-screen overflow-hidden flex items-center justify-center font-mono">
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-auto bg-gray-800 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                    style="background-image: url('https://source.unsplash.com/oWTW-jNGl9I/600x800')"
                ></div>
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-gray-800 p-5 rounded-r-lg">
                    <div class="px-8 mb-4 text-center">
                        <h3 class="pt-4 text-2xl text-center font-semibold text-gray-500">
                            {{ __('Forgot Your Password?') }}
                        </h3>
                        <p class="mb-4 text-sm text-gray-500">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!
                        </p>
                    </div>
                    
                    @if (session('status'))
                        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                          <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                          <p>{{ session('status') }}</p>
                        </div>
                    @endif

                    <form class="px-8 pt-6 pb-8 mb-4 rounded" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <x-inputs.label for="email">{{ __('Email') }}</x-inputs.label>
                            
                            <x-inputs.input type="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter Email Address..." autofocus></x-inputs.input>

                           @include('layouts.error', ['data' => 'email'])
                        </div>
                        <div class="mb-6 text-center">
                            <x-inputs.button>
                                {{ __('Reset Password') }}
                            </x-inputs.button>
                        </div>
                        <hr class="mb-6 border-t border-gray-700" />
                        <div class="text-center">
                            <a href="/register" class="inline-block font-semibold text-sm text-blue-500 align-baseline hover:text-blue-400">
                                {{ __('Create an Account!') }}
                            </a>
                        </div>
                        <div class="text-center">
                            <a href="/login" class="inline-block font-semibold text-sm text-blue-500 align-baseline hover:text-blue-400">
                                {{ __('Already have an account? Login!') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
