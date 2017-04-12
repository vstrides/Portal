@extends('layouts.app')

@section('content')
	
	<div class="row">
		@include('questions.partials.list')	
		{{ $questions->links() }}
	</div>

@stop