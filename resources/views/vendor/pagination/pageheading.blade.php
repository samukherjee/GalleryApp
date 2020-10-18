@if($show == true)
	<span>{!! __('Page - ') !!}{{ $paginator->currentPage() }}</span>
@endif

@if($paginator->count() != 0)
    <p class="ml-3 text-sm leading-5">
        {!! __('(') !!}
        <span class="font-medium">{{ $paginator->firstItem() }}</span>
        {!! __('-') !!}
        <span class="font-medium">{{ $paginator->lastItem() }}</span>
        {!! __(')') !!}
    </p>
@else
    <p class="ml-3 text-sm leading-5">
        {!! __('(0)') !!}
    </p>
@endif