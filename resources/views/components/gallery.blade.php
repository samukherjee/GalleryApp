<section class="thumbnail-listing py-2 w-full">
	<ul>
		@if($wallpapers->total() === 0)
			<p class="w-full py-3 text-center font-sans antialiased text-gray-500 leading-normal tracking-wider font-semibold">
				{{$message}}
			</p>
		@else
			@foreach($wallpapers as $wallpaper)
				<li>
			    	<x-thumbnail :wallpaper="$wallpaper"></x-thumbnail>
			    </li>
			@endforeach
		@endif
	</ul>
</section>