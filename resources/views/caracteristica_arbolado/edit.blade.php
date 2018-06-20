@extends('layout')

@section('content')

	@include('error')

	@if(sizeof($errores))
		<h2 class="text-success">Los siguientes campos tienen error</h2>
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
		{!! Form::model($registro, ['route' => ['caracteristica_arbolado.update', $registro->id], 'method' => 'PUT']) !!}

		<div class="form-group">
			{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_levantamiento', $errores) !== false) echo 'has-error' ?>">
			<a name="id_levantamiento"></a>
			{!! Form::label('id_levantamiento', 'id_levantamiento') !!}
			{!! Form::text('id_levantamiento', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('numero_arbol', $errores) !== false) echo 'has-error' ?>">
			<a name="numero_arbol"></a>
			{!! Form::label('numero_arbol', 'numero_arbol') !!}
			{!! Form::text('numero_arbol', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_coordenada', $errores) !== false) echo 'has-error' ?>">
			<a name="id_coordenada"></a>
			{!! Form::label('id_coordenada', 'id_coordenada') !!}
			{!! Form::text('id_coordenada', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_especie', $errores) !== false) echo 'has-error' ?>">
			<a name="id_especie"></a>
			{!! Form::label('id_especie', 'id_especie') !!}
			{!! Form::text('id_especie', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_forma_biologica', $errores) !== false) echo 'has-error' ?>">
			<a name="id_forma_biologica"></a>
			{!! Form::label('id_forma_biologica', 'id_forma_biologica') !!}
			{!! Form::text('id_forma_biologica', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_forma_fuste', $errores) !== false) echo 'has-error' ?>">
			<a name="id_forma_fuste"></a>
			{!! Form::label('id_forma_fuste', 'id_forma_fuste') !!}
			{!! Form::text('id_forma_fuste', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_condicion', $errores) !== false) echo 'has-error' ?>">
			<a name="id_condicion"></a>
			{!! Form::label('id_condicion', 'id_condicion') !!}
			{!! Form::text('id_condicion', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('diametro_altura_pecho', $errores) !== false) echo 'has-error' ?>">
			<a name="diametro_altura_pecho"></a>
			{!! Form::label('diametro_altura_pecho', 'diametro_altura_pecho') !!}
			{!! Form::text('diametro_altura_pecho', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('altura_total', $errores) !== false) echo 'has-error' ?>">
			<a name="altura_total"></a>
			{!! Form::label('altura_total', 'altura_total') !!}
			{!! Form::text('altura_total', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('altura_fuste_limpio', $errores) !== false) echo 'has-error' ?>">
			<a name="altura_fuste_limpio"></a>
			{!! Form::label('altura_fuste_limpio', 'altura_fuste_limpio') !!}
			{!! Form::text('altura_fuste_limpio', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('altura_comercial', $errores) !== false) echo 'has-error' ?>">
			<a name="altura_comercial"></a>
			{!! Form::label('altura_comercial', 'altura_comercial') !!}
			{!! Form::text('altura_comercial', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('diametro_copa', $errores) !== false) echo 'has-error' ?>">
			<a name="diametro_copa"></a>
			{!! Form::label('diametro_copa', 'diametro_copa') !!}
			{!! Form::text('diametro_copa', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('posicion_copa', $errores) !== false) echo 'has-error' ?>">
			<a name="posicion_copa"></a>
			{!! Form::label('posicion_copa', 'posicion_copa') !!}
			{!! Form::text('posicion_copa', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('proporcion_copa_viva', $errores) !== false) echo 'has-error' ?>">
			<a name="proporcion_copa_viva"></a>
			{!! Form::label('proporcion_copa_viva', 'proporcion_copa_viva') !!}
			{!! Form::text('proporcion_copa_viva', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('exposicion_luz', $errores) !== false) echo 'has-error' ?>">
			<a name="exposicion_luz"></a>
			{!! Form::label('exposicion_luz', 'exposicion_luz') !!}
			{!! Form::text('exposicion_luz', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('densidad_copa', $errores) !== false) echo 'has-error' ?>">
			<a name="densidad_copa"></a>
			{!! Form::label('densidad_copa', 'densidad_copa') !!}
			{!! Form::text('densidad_copa', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('transparencia_copa', $errores) !== false) echo 'has-error' ?>">
			<a name="transparencia_copa"></a>
			{!! Form::label('transparencia_copa', 'transparencia_copa') !!}
			{!! Form::text('transparencia_copa', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('muerte_regresiva', $errores) !== false) echo 'has-error' ?>">
			<a name="muerte_regresiva"></a>
			{!! Form::label('muerte_regresiva', 'muerte_regresiva') !!}
			{!! Form::text('muerte_regresiva', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('descripcion', $errores) !== false) echo 'has-error' ?>">
			<a name="descripcion"></a>
			{!! Form::label('descripcion', 'descripcion') !!}
			{!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('numero_tallo', $errores) !== false) echo 'has-error' ?>">
			<a name="numero_tallo"></a>
			{!! Form::label('numero_tallo', 'numero_tallo') !!}
			{!! Form::text('numero_tallo', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_vigor', $errores) !== false) echo 'has-error' ?>">
			<a name="id_vigor"></a>
			{!! Form::label('id_vigor', 'id_vigor') !!}
			{!! Form::text('id_vigor', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_vigor_etapa', $errores) !== false) echo 'has-error' ?>">
			<a name="id_vigor_etapa"></a>
			{!! Form::label('id_vigor_etapa', 'id_vigor_etapa') !!}
			{!! Form::text('id_vigor_etapa', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_forma_biologica_tocon', $errores) !== false) echo 'has-error' ?>">
			<a name="id_forma_biologica_tocon"></a>
			{!! Form::label('id_forma_biologica_tocon', 'id_forma_biologica_tocon') !!}
			{!! Form::text('id_forma_biologica_tocon', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_especie_cat_tax', $errores) !== false) echo 'has-error' ?>">
			<a name="id_especie_cat_tax"></a>
			{!! Form::label('id_especie_cat_tax', 'id_especie_cat_tax') !!}
			{!! Form::text('id_especie_cat_tax', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('x', $errores) !== false) echo 'has-error' ?>">
			<a name="x"></a>
			{!! Form::label('x', 'x') !!}
			{!! Form::text('x', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('y', $errores) !== false) echo 'has-error' ?>">
			<a name="y"></a>
			{!! Form::label('y', 'y') !!}
			{!! Form::text('y', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_colecta_botanica', $errores) !== false) echo 'has-error' ?>">
			<a name="id_colecta_botanica"></a>
			{!! Form::label('id_colecta_botanica', 'id_colecta_botanica') !!}
			{!! Form::text('id_colecta_botanica', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('azimut', $errores) !== false) echo 'has-error' ?>">
			<a name="azimut"></a>
			{!! Form::label('azimut', 'azimut') !!}
			{!! Form::text('azimut', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('distancia', $errores) !== false) echo 'has-error' ?>">
			<a name="distancia"></a>
			{!! Form::label('distancia', 'distancia') !!}
			{!! Form::text('distancia', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('angulo_inclinacion', $errores) !== false) echo 'has-error' ?>">
			<a name="angulo_inclinacion"></a>
			{!! Form::label('angulo_inclinacion', 'angulo_inclinacion') !!}
			{!! Form::text('angulo_inclinacion', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('diametro_copa_norte_sur', $errores) !== false) echo 'has-error' ?>">
			<a name="diametro_copa_norte_sur"></a>
			{!! Form::label('diametro_copa_norte_sur', 'diametro_copa_norte_sur') !!}
			{!! Form::text('diametro_copa_norte_sur', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('diametro_copa_este_oeste', $errores) !== false) echo 'has-error' ?>">
			<a name="diametro_copa_este_oeste"></a>
			{!! Form::label('diametro_copa_este_oeste', 'diametro_copa_este_oeste') !!}
			{!! Form::text('diametro_copa_este_oeste', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('nombre_comun', $errores) !== false) echo 'has-error' ?>">
			<a name="nombre_comun"></a>
			{!! Form::label('nombre_comun', 'nombre_comun') !!}
			{!! Form::text('nombre_comun', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_forma_geometrica', $errores) !== false) echo 'has-error' ?>">
			<a name="id_forma_geometrica"></a>
			{!! Form::label('id_forma_geometrica', 'id_forma_geometrica') !!}
			{!! Form::text('id_forma_geometrica', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('numero_tallos_pencas', $errores) !== false) echo 'has-error' ?>">
			<a name="numero_tallos_pencas"></a>
			{!! Form::label('numero_tallos_pencas', 'numero_tallos_pencas') !!}
			{!! Form::text('numero_tallos_pencas', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_forma_crecimiento', $errores) !== false) echo 'has-error' ?>">
			<a name="id_forma_crecimiento"></a>
			{!! Form::label('id_forma_crecimiento', 'id_forma_crecimiento') !!}
			{!! Form::text('id_forma_crecimiento', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('altura_total_maxima', $errores) !== false) echo 'has-error' ?>">
			<a name="altura_total_maxima"></a>
			{!! Form::label('altura_total_maxima', 'altura_total_maxima') !!}
			{!! Form::text('altura_total_maxima', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('altura_total_media', $errores) !== false) echo 'has-error' ?>">
			<a name="altura_total_media"></a>
			{!! Form::label('altura_total_media', 'altura_total_media') !!}
			{!! Form::text('altura_total_media', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('altura_total_minima', $errores) !== false) echo 'has-error' ?>">
			<a name="altura_total_minima"></a>
			{!! Form::label('altura_total_minima', 'altura_total_minima') !!}
			{!! Form::text('altura_total_minima', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('diametro_basal', $errores) !== false) echo 'has-error' ?>">
			<a name="diametro_basal"></a>
			{!! Form::label('diametro_basal', 'diametro_basal') !!}
			{!! Form::text('diametro_basal', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_grado_putrefaccion_tocon', $errores) !== false) echo 'has-error' ?>">
			<a name="id_grado_putrefaccion_tocon"></a>
			{!! Form::label('id_grado_putrefaccion_tocon', 'id_grado_putrefaccion_tocon') !!}
			{!! Form::text('id_grado_putrefaccion_tocon', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('id_clase_muerto_pie', $errores) !== false) echo 'has-error' ?>">
			<a name="id_clase_muerto_pie"></a>
			{!! Form::label('id_clase_muerto_pie', 'id_clase_muerto_pie') !!}
			{!! Form::text('id_clase_muerto_pie', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group <?php if(array_search('densidad_follaje_colonia', $errores) !== false) echo 'has-error' ?>">
			<a name="densidad_follaje_colonia"></a>
			{!! Form::label('densidad_follaje_colonia', 'densidad_follaje_colonia') !!}
			{!! Form::text('densidad_follaje_colonia', null, ['class' => 'form-control']) !!}
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

