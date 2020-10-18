@extends('layouts.app')

@section('content')
    <div class="h-auto overflow-hidden flex items-center justify-center font-mono bg-gray-900">
        <!-- Container -->
        <div class="container mx-auto">
            <div class="flex justify-center px-6 my-12">
                <!-- Row -->
                <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                    <!-- Col -->
                    <div class="w-full h-auto bg-gray-800 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                        style="background-image: url('https://source.unsplash.com/K4mSJ7kc0As/600x800')"
                    ></div>
                    <!-- Col -->
                    <div class="w-full lg:w-1/2 bg-gray-800 p-5 rounded-lg lg:rounded-l-none">
                        <h3 class="pt-4 text-2xl text-center font-semibold text-gray-500">{{ __('Welcome Back!') }}</h3>
                        <form class="px-8 pt-6 pb-8 mb-4 bg-gray-800 rounded" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <x-inputs.label for="email">{{ __('Email') }}</x-inputs.label>
                                
                                <x-inputs.input type="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter Email Address..." autofocus></x-inputs.input>

                                @include('layouts.error', ['data' => 'email'])
                            </div>

                            <div class="mb-4">
                                <x-inputs.label for="password">{{ __('Password') }}</x-inputs.label>

                                <x-inputs.input type="password" placeholder="Enter Password..."></x-inputs.input>
                                
                                @include('layouts.error', ['data' => 'password'])
                            </div>

                            <div class="mb-4">
                                <x-inputs.label for="remember">{{ __('Remember Me') }}</x-inputs.label>
                                
                                <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                            </div>
                            
                            <div class="mb-6 text-center">
                                <x-inputs.button>{{ __('Login') }}</x-inputs.button>
                            </div>
                            <hr class="mb-6 border-t border-gray-700" />
                            <div class="text-center">
                                <a class="inline-block font-semibold text-sm text-blue-500 align-baseline hover:text-blue-400" href="/register">
                                    {{ __('Create an Account!') }}
                                </a>
                            </div>
                            <div class="text-center">
                                <a class="inline-block font-semibold text-sm text-blue-500 align-baseline hover:text-blue-400" href="/password/reset">
                                    {{ __('Forgot Password?') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
