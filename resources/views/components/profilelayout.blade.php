@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ url('/css/custom.css') }}">
<link rel="stylesheet" href="{{ url('/css/gallery.css') }}">
<link rel="stylesheet" href="{{ url('/css/button.css') }}">
@endsection

@section('js')
    <script src="/js/jquery.js"></script>
@endsection

@section('content')
	<div class="w-full">
		{{ $slot }}
    </div>
@endsection