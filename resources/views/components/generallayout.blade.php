@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ url('/css/custom.css') }}">
<link rel="stylesheet" href="{{ url('/css/gallery.css') }}">
<link rel="stylesheet" href="{{ url('/css/button.css') }}">
@endsection

@section('js')
    <script src="/js/jquery.js"></script>
    <script src="/js/dropzone.js"></script>
    <script src="/js/dropzone-config.js"></script>
@endsection

@section('content')
    <div class="w-full min-w-lg font-sans antialiased bg-gray-900 text-gray-200 leading-normal tracking-wider bg-cover">
    	{{ $slot }}
	</div>
@endsection