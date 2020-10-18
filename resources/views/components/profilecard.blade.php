<div class="mt-3 w-full h-64 shadow-md mx-6 bg-cover bg-center bg-gray-800 rounded-t-md" 
	 style="background-image: url('{{ $user->cover }}')">
	<div class="relative flex items-center p-4 h-full text-center">
		<div class=" block h-40 w-40 bg-cover bg-center bg-white rounded-full shadow-lg border-4 border-white" style="background-image: url('{{ $user->avatar }}')"></div>
		<h1 class="absolute left-0 mt-48 w-48 text-center text-white text-3xl font-bold italic">
			{{ ucwords($user->username) }}
		</h1>
	</div>
</div>

<div class="w-full flex justify-between shadow-md mx-6 overflow-hidden bg-gray-800 rounded-b-md">
	<a href="/profile/{{ $user->username }}" class="block w-1/3 h-12 hover:no-underline flex items-center justify-center font-semibold text-gray-400 cursor-pointer text-center hover:bg-gray-700 hover:text-gray-400">
		General
	</a>

	<a href="/profile/{{ $user->username }}/uploads" class="block w-1/3 h-12 hover:no-underline flex items-center justify-center font-semibold text-gray-400 cursor-pointer text-center hover:bg-gray-700 hover:text-gray-400">
		Uploads ({{ $wallpapers->total() }})
	</a>

	<a href="/profile/{{ $user->username }}/favorites" class="block w-1/3 h-12 hover:no-underline flex items-center justify-center font-semibold text-gray-400 cursor-pointer text-center hover:bg-gray-700 hover:text-gray-400">
		Favorites (0)
	</a>
</div>