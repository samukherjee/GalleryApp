<x-profilelayout>
	<div class="w-full lg:w-10/12 flex items-center h-auto flex-wrap mx-auto">
		<x-panel>
			<x-slot name="title">General Settings</x-slot>

			<div class="w-full flex justify-between">
				<x-settingpanel state="1"></x-settingpanel>
				<div class="w-9/12 p-4">
					<form method="POST" action="/setting/general">
						@csrf
						@method('PATCH')

						<div class="mb-3">
							<x-inputs.label for="username">{{ __('Username') }}</x-inputs.label>
							
							<x-inputs.input type="text" value="{{ $user->username }}" autocomplete="username"></x-inputs.input>

							@include('layouts.error', ['data' => 'username'])
						</div>

						<div class="mb-3">
		                    <x-inputs.label for="email">{{ __('Email') }}</x-inputs.label>

		                    <x-inputs.input type="email" value="{{ $user->email }}" autocomplete="email"></x-inputs.input>

		                    @include('layouts.error', ['data' => 'email'])
		                </div>

						<div class="mb-3">
							<x-inputs.label for="password">{{ __('Password') }}</x-inputs.label>
							
							<x-inputs.input type="password"></x-inputs.input>

							@include('layouts.error', ['data' => 'password'])
						</div>

						<div class="mb-3">
							<x-inputs.label for="password_confirmation">{{ __('Password Confirmation') }}</x-inputs.label>
							
							<x-inputs.input type="password" name="password_confirmation"></x-inputs.input>

							@include('layouts.error', ['data' => 'password_confirmation'])
						</div>

						<div class="flex justify-end mt-1">
							<x-inputs.button>Submit</x-inputs.button>
						</div>
					</form>
				</div>
			</div>
		</x-panel>		
	</div>
</x-profilelayout>