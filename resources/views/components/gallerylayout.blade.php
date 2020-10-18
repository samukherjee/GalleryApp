@extends('layouts.app')

@section('head')
	<link href="{{ asset('css/gallery.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="w-full">
		{{ $slot }}
    </div>
@endsection