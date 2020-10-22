@extends('layouts.app')

@section('head')
<style>
.tt-menu {
    width: 100%;
    margin-top: 5px;
    padding: 5px 0;
    background-color: #4a5568;
    border-radius: 4px;
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
}
.tt-suggestion {
    padding: 3px 20px;
    font-size: 18px;
    line-height: 24px;
    cursor: pointer;
    color:white;
}
.tt-suggestion:hover {
    background-color: #0097cf;
}
.tagdeletebutton{
	display:none;
}
.tag:hover > .tagdeletebutton{
	display:block;
}
</style>
@endsection

@section('content')
	<div class="w-full">
		{{ $slot }}
    </div>
@endsection

@section('js')
	<script id="result-template" type="text/x-handlebars-template">
	  <div class="w-full py-1 px-5 cursor-pointer bg-gray-700 hover:bg-blue-500">
	    @{{name}} 
	  </div>
	</script>

	<script id="empty-template" type="text/x-handlebars-template">
	  <div class="EmptyMessage">Not found.</div>
	</script>

	<script src="{{ asset('js/handlebars.js') }}"></script>
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/typeahead.js') }}"></script>
	<script src="{{ asset('js/typeahead-config.js') }}"></script>
@endsection

