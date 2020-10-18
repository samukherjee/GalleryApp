@extends('layouts.app')

@section('content')
    <!-- <form class="h-full w-full flex flex-1 flex-wrap justify-center" method="post" action="{{ url('/upload') }}" enctype="multipart/form-data">
      @csrf
         <input type="file" name="file">
         <x-inputs.button>Upload</x-inputs.button>
      </div>
    </form> -->
    <div class="mx-auto w-10/12">
        <x-test.authentication-card>
            <x-slot name="logo">
                <x-test.authentication-card-logo />
            </x-slot>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <div class="block">
                    <x-test.label for="email" value="{{ __('Email') }}" />
                    <x-test.input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
                </div>

                <div class="mt-4">
                    <x-test.label for="password" value="{{ __('Password') }}" />
                    <x-test.input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-test.label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-test.input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-test.button>
                        {{ __('Reset Password') }}
                    </x-test.button>
                </div>
            </form>
        </x-test.authentication-card>
    </div>
@endsection
