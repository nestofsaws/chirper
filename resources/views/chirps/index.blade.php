@extends('layouts.app')
@section('content')

@if(count($chirps)>1)
	@foreach ($chirps as $chirp)
		<div class="well">
			<p>{{$chirp->chirp}}</p>
		</div>
	@endforeach
@else
	<h2>No Chirps Found</h2>
@endif
@endsection