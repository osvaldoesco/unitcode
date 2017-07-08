@extends('layout.app')


@section('content')

	<div class="row">
		<div class="col-md-12">
			<h2>{{ $post->title}}</h2>
			<h5>{{ $post->description}}</h5>
			<a href="{{ $post->url}}"></a>{{ $post->url}}<p>
			<p>Posted {{ $post->created_at->diffForHumans()}}.</p>
	    </div>
				
	</div>

@endsection