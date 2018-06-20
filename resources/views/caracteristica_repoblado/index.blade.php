@extends('layout')

@section('content')

	<div class="col-xs-12">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>tipo_repoblado</th>
					<th>nombre_comun</th>
					<th>numero_colecta</th>
					<th>frecuencia</th>
					<th>edad</th>
					<th>porcentaje_cobertura</th>
					<th colspan="3">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($grid AS $row)
				<tr>
					<td>{{ $row->id }}</td>
					<td>{{ $row->tipo_repoblado }}</td>
					<td>{{ $row->nombre_comun }}</td>
					<td>{{ $row->numero_colecta }}</td>
					<td>{{ $row->frecuencia }}</td>
					<td>{{ $row->edad }}</td>
					<td>{{ $row->porcentaje_cobertura }}</td>
					<td><a href="{{ route('caracteristica_repoblado.edit', $row->id) }}">Editar</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	    {!! $grid->render() !!}
	</div>

@endsection
