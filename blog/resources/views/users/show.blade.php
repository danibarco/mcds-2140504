@extends('layouts.app')
@section('title', 'Consultar Usuario')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>
				<i class="fa fa-search"></i>
				Consultar Usuario
			</h1>
			<hr>
			{{ $user }}
		</div>
	</div>
	
@endsection