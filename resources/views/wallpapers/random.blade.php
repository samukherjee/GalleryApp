<x-gallerylayout>
	<div class="w-full lg:w-10/12 flex items-center h-auto flex-wrap mx-auto">
		
		<x-galleryherosection name="Random Wallpapers" total="{{$wallpapers->total()}}"></x-galleryherosection>

		<x-panel>
			<x-slot name="title">
				{{ $wallpapers->links('vendor.pagination.pageheading',['show'=>true]) }}
			</x-slot>

			<x-gallery :wallpapers="$wallpapers" message="No Latest Wallpapers Yet."></x-gallery>

			<x-slot name="footer">
				@if ($wallpapers->hasPages())
					{{ $wallpapers->links('vendor.pagination.tailwind') }}
				@endif
			</x-slot>
		</x-panel>
	</div>
</x-gallerylayout>