<figure class="thumbnail" style="width:300px;height:200px">
	<img alt="loading" class="object-cover w-full h-full" 
		 src="/storage/thumbnail/{{ $wallpaper->filename }}">
	<a class="preview" href="/wallpaper/{{$wallpaper->id}}" target="_blank"></a>
	<div class="thumbnail-info">
		<span class="wall-res">{{ $wallpaper->width }} x {{ $wallpaper->height }}</span>
		<a class="wall-favs cursor-pointer">
			<i class="fa fa-star"></i>
		</a>
		<a class="wall-like cursor-pointer">
			<i class="fa fa-heart"></i>
		</a>
	</div>
</figure>