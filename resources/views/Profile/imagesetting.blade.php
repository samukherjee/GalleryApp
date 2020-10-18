<x-profilelayout>
	<div class="w-full lg:w-10/12 flex items-center h-auto flex-wrap mx-auto">
		<x-panel>
			<x-slot name="title">Avatar & Cover Setting</x-slot>
			<div class="w-full flex justify-between">
				<x-settingpanel state="2"></x-settingpanel>
				<div class="w-9/12 p-4">
					<form method="POST" action="/setting/avatar-and-cover" enctype="multipart/form-data">
						@csrf
						@method('PATCH')

						<div class="mb-3">
							<x-inputs.label for="avatar">Avatar</x-inputs.label>
							
							<img class="w-24 h-24 shadow-sm rounded-full mb-3" src="{{ $user->avatar }}" alt="{{ $user->username }}'s avatar pic.">
							
							<x-inputs.selectbutton name="avatar"></x-selectbutton>
														
							@include('layouts.error', ['data' => 'avatar'])
						</div>

						<div class="mb-3">
							<x-inputs.label for="cover">Cover</x-inputs.label>
							
							<img class="w-1/2 shadow-sm rounded mb-3" src="{{ $user->cover }}" alt="{{ $user->username }}'s cover pic.">
							
							<x-inputs.selectbutton name="cover"></x-selectbutton>
							
							@include('layouts.error', ['data' => 'cover'])
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