@foreach($items as $item)
	<li>
		<a href="{{ $item->url() }}">
        @if($item->attributes['ico'])
        {{ dd($item) }}
            <i class="{{ dd($item->attributes['ico']) }}">
        @endif
        {{ $item->title }}</a>
		@if($item->hasChildren())
			
			<ul class="sub-menu">
				@include('layouts.navi', ['items'=>$item->children()])
			</ul>
			
		@endif
	
	</li>
@endforeach



