<x-taglayout>
	<div class="w-full lg:w-10/12 flex items-center h-auto flex-wrap mx-auto">

		<x-panel>
			<table class="w-full shadow-lg rounded">
				<thead>
					<tr class="text-left border-b border-gray-700 uppercase">
						<th class="px-4 py-3 text-sm text-gray-400">Id</th>
						<th class="text-sm text-gray-400">Tags</th>
						<th class="text-sm text-gray-400">Total Wallpapers</th>
						<th class="text-sm text-gray-400">Created By</th>
						<th class="text-sm text-gray-400">Created At</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tags as $tag)
					<tr class="accordion border-b border-gray-700 hover:bg-gray-700">
						<td class="px-4 py-2">
							<span class="font-semibold text-gray-400">{{$tag->id}}</span>
						</td>
						<td class="flex inline-flex items-center">
							<a href="/tag/{{$tag->slug}}" target="_blank" class="w-full py-2 text-gray-400 text-md font-semibold hover:text-white">
								{{ ucwords($tag->name) }}
							</a>
						</td>
						<td>
							<p class="text-sm text-gray-400 font-semibold font-medium">
								{{$tag->wallpapers_count}} {{\Str::plural('wallpaper', $tag->wallpapers_count)}}
							</p>
						</td>
						<td>
							<p class="text-sm text-gray-400 font-semibold font-medium">	
								{{ ucwords($tag->username) }}
							</p>
						</td>
						<td>
							<p class="text-sm text-gray-400 font-semibold font-medium">
								{{$tag->created_at->diffForHumans()}}
							</p>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<x-slot name="footer">
				@if ($tags->hasPages())
					{{ $tags->links('vendor.pagination.tailwind') }}
				@endif
			</x-slot>
		</x-panel>
	</div>
</x-taglayout>