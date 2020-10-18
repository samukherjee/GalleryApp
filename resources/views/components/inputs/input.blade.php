<input 
	class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border-2 rounded shadow-sm 
	@error($type === 'text' ? 'username' : $type) border-red-500 @enderror appearance-none focus:outline-none focus:shadow-outline"

	@if(isset($name))
		name="{{$name}}" 
	@else
		name="{{ $type === 'text' ? 'username' : $type }}" 
		id="{{ $type === 'text' ? 'username' : $type }}"
	@endif

	@if(isset($id))
		name="{{$id}}" 
	@endif
	
	required="required"

	{{ $attributes }}
>