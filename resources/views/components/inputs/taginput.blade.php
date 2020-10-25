<input 
	class="w-full appearance-none bg-transparent border-none text-gray-600 mr-3 py-1 px-2 leading-tight focus:outline-none" 
	type="text"
	name="{{$name}}" 
	Placeholder="Tags can be comma seperated... (Eg: Cars,nature,moutains)" 
	autofocus 
	{{ $attributes }}
>
<button 
	class="bg-blue-500 hover:bg-blue-700 text-sm text-white py-1 px-2 rounded font-bold"
	type="submit"
>
	Add Tag
</button>