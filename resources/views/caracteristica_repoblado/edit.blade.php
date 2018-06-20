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
		{!! Form::model($registro, ['route' => ['caracteristica_repoblado.update', $registro->id], 'method' => 'PUT']) !!}
		
		<div class="form-group">
			{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
		</div>
		<div class="form-group <?php if(array_search('tipo_repoblado', $errores) !== false) echo 'has-error' ?>">
			<a name="tipo_repoblado"></a>
			{!! Form::label('tipo_repoblado', 'tipo_repoblado') !!}
			{!! Form::text('tipo_repoblado', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('nombre_comun', $errores) !== false) echo 'has-error' ?>">
			<a name="nombre_comun"></a>
			{!! Form::label('nombre_comun', 'nombre_comun') !!}
			{!! Form::text('nombre_comun', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('numero_colecta', $errores) !== false) echo 'has-error' ?>">
			<a name="numero_colecta"></a>
			{!! Form::label('numero_colecta', 'numero_colecta') !!}
			{!! Form::text('numero_colecta', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('frecuencia', $errores) !== false) echo 'has-error' ?>">
			<a name="frecuencia"></a>
			{!! Form::label('frecuencia', 'frecuencia') !!}
			{!! Form::text('frecuencia', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('edad', $errores) !== false) echo 'has-error' ?>">
			<a name="edad"></a>
			{!! Form::label('edad', 'edad') !!}
			{!! Form::text('edad', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('porcentaje_cobertura', $errores) !== false) echo 'has-error' ?>">
			<a name="porcentaje_cobertura"></a>
			{!! Form::label('porcentaje_cobertura', 'porcentaje_cobertura') !!}
			{!! Form::text('porcentaje_cobertura', null, ['class' => 'form-control']) !!}
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

