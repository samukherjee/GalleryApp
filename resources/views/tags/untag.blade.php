<x-wallpaper-showing-layout>
	<div class="w-full lg:w-10/12 flex items-center h-auto flex-wrap mx-auto">
		
		<x-panel>
			<x-slot name="title">
				Pending Uploads
			</x-slot>

			<div class="p-4">
				@if(!$wallpapers == null)
					@foreach($wallpapers as $wallpaper)
						<div class="flex pb-3">
							<x-thumbnail :wallpaper="$wallpaper"></x-thumbnail>
							
							<form class="flex-1 flex flex-col pl-3" method="POST" action="/tag/{{$wallpaper->id}}">
								@csrf

								<x-inputs.label for="tags">
									{{ __('Tags') }}
								</x-inputs.label>

								<div class="flex items-center border-b-2 border-gray-500 py-2 @error('tags') border-red-500 @enderror">
									<x-inputs.taginput id="my_search" name="tags"></x-inputs.taginput>
								</div>

								@include('layouts.error', ['data' => 'tags-'.$wallpaper->id])
							</form>
						</div>
					@endforeach
				@else
					<div class="flex py-3">
						<p class="w-full text-center font-sans antialiased text-gray-500 leading-normal tracking-wider font-semibold">
							No pending Upload to show here.
						</p>
					</div>
				@endif
			</div>
		</x-panel>
	</div>
</x-wallpaper-showing-layout>
