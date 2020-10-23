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
	<script src="{{ asset('js/jquery.js') }}"></script>
@endsection

