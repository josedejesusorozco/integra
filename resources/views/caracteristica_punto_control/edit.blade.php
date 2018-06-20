@extends('layout')

@section('content')

	@include('error')

	@if(sizeof($errores))
		<h2 class="text-warning">Los siguientes campos tienen error</h2>
		<div class="list-group list-group-horizontal">
			@foreach($errores AS $error)
				<a href="#{{ $error }}" class="list-group-item" style="display: inline-block;">{{ $error }}</a>
			@endforeach
		</div>
	@endif

	<div class="col-xs-12">
		<h2>
			ID:&nbsp;{{ $registro->id }}
		</h2>
		{!! Form::model($registro, ['route' => ['caracteristica_punto_control.update', $registro->id], 'method' => 'PUT']) !!}
		
		<div class="form-group">
			{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
		</div>
		<div class="form-group <?php if(array_search('paraje', $errores) !== false) echo 'has-error' ?>">
			<a name="paraje"></a>
			{!! Form::label('paraje', 'paraje') !!}
			{!! Form::text('paraje', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>

	<script type="text/javascript">
		function irMarcador(marcador) {
			alert(marcador);
		}
		$( document ).ready(function() {
		    //console.log( "ready!" );
		});
	</script>
@endsection

