<x-wallpaper-showing-layout>
	<div class="h-full w-10/12 mx-auto px-4">
		<div class="flex justify-center mt-3">
			<img alt="loading" class="bg-gray-800 {{ $mode }}" 
			src="/storage/wallpapers/{{ $wallpaper->filename }}"
			>
		</div>
		<div class="mt-3 flex flex-col w-full p-3 bg-gray-800 text-gray-100 rounded">
			<div class="flex-1 px-2 flex flex-col">
				<div class="w-full text-center mb-2 rounded font-semibold">
					Wallpaper Info
				</div>
				<div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">
					<p class="p-2 truncate rounded bg-gray-700">Uploaded by - 
						<a href="/profile/{{$wallpaper->user->username}}/uploads" class="hover:no-underline hover:text-gray-300">
							{{ ucwords($wallpaper->user->username )}}
						</a>
					</p>

					<p class="p-2 truncate rounded bg-gray-700">
						Filename - {{$wallpaper->filename}}
					</p>
					
					<p class="p-2 truncate rounded bg-gray-700">
						Size - {{$wallpaper->size}} MB
					</p>
					
					<p class="p-2 truncate rounded bg-gray-700">
						Dimension - {{$wallpaper->width}} x {{$wallpaper->height}}
					</p>
					
					<p class="p-2 truncate rounded bg-gray-700">
						Ratio - {{ $wallpaper->width/$wallpaper->height }}
					</p>
					
					<p class="p-2 truncate rounded bg-gray-700">
						Uploaded at - {{$wallpaper->created_at->diffForHumans()}}
					</p>
					
					<p class="p-2 truncate rounded bg-gray-700">
						Views - {{$wallpaper->views}}
					</p>
				</div>
			</div>

			<div class="m-3 md:flex">
				<div class="w-full py-2 border-t-2 border-gray-700">
					<div class="pb-2 flex items-center justify-center font-semibold">
						Save this wallpaper in your favorites list.
					</div>
					<div class="flex items-center justify-center">
						<button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-6 border-b-4 border-blue-700 hover:border-blue-500 rounded-full">
							Favorites
						</button>
					</div>
				</div>
				<div class="w-full py-2 border-t-2 border-gray-700">
					<div class="w-full text-center mb-2 rounded font-semibold">
						<div class="pb-2 flex items-center justify-center font-semibold">
							Tags
						</div>

						@auth
							@include('layouts.error', ['data' => 'tags'])

							<div class="flex justify-center">
								<form class="w-full" id="tag-add-form">
									<div class="flex items-center border-b-2 border-gray-500 py-2 @error('tags') border-red-500 @enderror">
										<x-inputs.taginput id="my_search" name="tags"></x-inputs.taginput>
									</div>
								</form>

							</div>
						@endauth

						<div class="w-full p-2 wrap">
							@if(count($wallpaper->tags))
								@foreach($wallpaper->tags as $tag)
									<a href="/tag/{{$tag->slug}}" class="px-3 my-1 float-left py-1 m-1 rounded-full bg-gray-700 hover:text-gray-400">
										#{{ str_replace('-', ' ', $tag->slug) }}
									</a>
								@endforeach
							@else
								@guest
									<p class="w-full">
										<a href="/login" class="hover:text-white">Login</a> & Add tags here.
									</p>
								@endguest
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

	$('#tag-add-form').on('submit',function(event){
	  event.preventDefault();

	  tag = $('#my_search').val();

	  $.ajax({
	    url: "/tag/{{$wallpaper->id}}",
	    type:"POST",
	    data:{
	      "_token": "{{ csrf_token() }}",
	      tags:tag,
	    },
	    success:function(response){
	      console.log(response);
	    },
	  });
	});
	</script>
</x-wallpaper-showing-layout>