<x-profilelayout>
	<div class="relative w-full lg:w-10/12 flex items-center h-auto flex-wrap mx-auto">
		
		<x-profilecard :wallpapers="$wallpapers" :user="$user"></x-profilecard>

		<x-panel>
			<x-slot name="title">
				Uploads
				{{ $wallpapers->links('vendor.pagination.pageheading',['show'=>false]) }}
			</x-slot>

			<x-gallery :wallpapers="$wallpapers" message="No Uploaded Wallpapers Yet."></x-gallery>

			<x-slot name="footer">
				@if ($wallpapers->hasPages())
					{{ $wallpapers->links('vendor.pagination.tailwind') }}
				@endif
			</x-slot>
		</x-panel>

	</div>
</x-profilelayout>