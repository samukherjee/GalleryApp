<button 
		type="submit" 
		{{ $attributes->merge(['class' => 'bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded']) }} 
		{{ $attributes }}
>
	{{$slot}}
</button>