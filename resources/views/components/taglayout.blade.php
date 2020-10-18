@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="/js/jquery.js"></script>
    <script src="/js/typehead.js"></script>
    <script src="/js/bootstrap-tagsinput.js"></script>
@endsection

@section('content')
    <div class="w-full min-w-lg font-sans antialiased bg-gray-900 text-gray-200 leading-normal tracking-wider bg-cover">
    	{{ $slot }}
	</div>
@endsection