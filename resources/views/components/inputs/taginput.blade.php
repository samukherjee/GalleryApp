<input 
	class="w-full appearance-none bg-transparent border-none w-full text-gray-600 mr-3 py-1 px-2 leading-tight focus:outline-none" 
	
	type="text"

	name="{{$name}}" 
	
	Placeholder="Tags can be comma seperated... (Eg: Cars,nature,moutains)" 
	
	autofocus 

	{{ $attributes }}
>
<button 
	class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded font-bold"

	type="submit"
>
	Add Tag
</button>