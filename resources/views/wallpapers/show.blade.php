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
						<x-inputs.button>
							Favorites
						</x-inputs.button>
					</div>
				</div>
				<div class="w-full py-2 border-t-2 border-gray-700">
					<div class="w-full text-center mb-2 rounded font-semibold">
						<div class="pb-2 flex items-center justify-center font-semibold">
							Tags
						</div>

						@auth
							<div id="error"></div>

							<div class="flex justify-center">
								<form  class="w-full" id="tag-add-form">
									<div class="flex items-center border-b-2 border-gray-500 py-2">
										<x-inputs.taginput name="tags"></x-inputs.taginput>
									</div>
								</form>

							</div>
						@endauth

						<div class="tagList w-full p-2 wrap">
							@if(count($wallpaper->tags))
								@foreach($wallpaper->tags as $tag)
									<div 
										class="tag relative ml-2 mb-2 text-md inline-flex items-center font-bold leading-sm px-3 py-1 rounded bg-gray-700"
										>
										<a href="/tag/{{$tag->slug}}" 
											class="text-gray-400 hover:text-gray-400"
										>
											#{{ str_replace('-', ' ', $tag->slug) }}
										</a>
										<button 
											class="tagdeletebutton absolute right-0 top-0 bottom-0 h-full text-gray-400 font-bold bg-gray-700 py-1 px-1 ml-2"
											data-id="{{$tag->id}}"
										>
											x
										</button>
									</div>
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
		$('#tag-add-form').on('submit',function(e){
			e.preventDefault();

			$.ajaxSetup({headers:{
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
			});

			var tag = $('#my_search').val();
			var token = $("meta[name='csrf-token']").attr("content");

			$.ajax({
				url:"/tag/{{$wallpaper->id}}",
				type:"POST",
				dataType:"json",
				data:{
					tags:tag,
				},
				success:function(response){
					$('#my_search').val('');
					$.each(response, function( index, value ) {
						$(".tagList").append('<div class="tag relative ml-2 mb-2 text-md inline-flex items-center font-bold leading-sm px-2 py-1 rounded bg-gray-700"><a href="/tag/'+value.slug+'" class="text-gray-400 hover:text-gray-400">#'+value.name+'</a><button class="tagdeletebutton absolute right-0 top-0 bottom-0 h-full text-gray-400 font-bold bg-gray-700 py-1 px-1 ml-2" data-id="'+value.id+'">x</button></div>');
					});
				},
				error:function(xhr, status, errors){
					console.log(xhr.responseJSON.errors);
					$.each(xhr.responseJSON.errors, function(key,value){
						console.log(value);
						$('#error').append('<p class="errormsg text-xs italic font-semibold text-red-500">'+value+'</p>');
					});
				}
			});
		});

		$(document).on('click', '.tagdeletebutton', function(e){
			e.preventDefault();

			$.ajaxSetup({headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
			});

			var that = this;
			var id = $(this).data("id");
			var token = $("meta[name='csrf-token']").attr("content");
			
			$.ajax({
				url: "/tagdetach/{{$wallpaper->id}}",
				type:"DELETE",
				data:{
					"id":id,
				},
				success:function(response){
					$(that).closest('.tag').hide();
				}
			});
		});

		$(document).ready(function(){
			$('#my_search').on('click',function(){
				$('.errormsg').hide();
			});
		});
	</script>
</x-wallpaper-showing-layout>
