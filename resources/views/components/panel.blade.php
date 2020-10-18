<div class="mt-3 w-full h-auto bg-gray-800 mx-6 shadow-md rounded">
	<!-- Header -->
	@if(isset($title))
		<header class="w-full flex items-center px-3 py-3 border-b-2 border-gray-700 font-semibold text-gray-400">
			{{ $title }}
		</header>
	@endif

	<!-- Body -->
	{{$slot}}
	
	<!-- Footer -->
	@if(isset($footer))
		{{ $footer }}
	@endif
</div>
