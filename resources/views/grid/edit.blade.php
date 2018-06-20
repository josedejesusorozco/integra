<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Migración</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

	<div class="row-content">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h2>
				ID:&nbsp;{{ $registro->id }}
			</h2>
			{!! Form::model($registro, ['route' => ['grid.update', $registro->id], 'method' => 'PUT']) !!}
			<div class="form-group">
				{!! Form::label('id_levantamiento', 'id_levantamiento') !!}
				{!! Form::text('id_levantamiento', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('numero_arbol', 'numero_arbol') !!}
				{!! Form::text('numero_arbol', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('id_coordenada', 'id_coordenada') !!}
				{!! Form::text('id_coordenada', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('id_especie', 'id_especie') !!}
				{!! Form::text('id_especie', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('id_forma_biologica', 'id_forma_biologica') !!}
				{!! Form::text('id_forma_biologica', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('id_forma_fuste', 'id_forma_fuste') !!}
				{!! Form::text('id_forma_fuste', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('id_condicion', 'id_condicion') !!}
				{!! Form::text('id_condicion', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class="col-md-1"></div>
	</div>

</body>
</html>