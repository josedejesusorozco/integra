@extends('layout')

@section('content')

	<div class="col-xs-12">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>id_levantamiento</th>
					<th>numero_arbol</th>
					<th>id_coordenada</th>
					<th>id_especie</th>
					<th>id_forma_biologica</th>
					<th>id_forma_fuste</th>
	                <th>id_condicion</th>
					<th colspan="3">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($grid AS $row)
				<tr>
					<td>{{ $row->id }}</td>
					<td>{{ $row->id_levantamiento }}</td>
					<td>{{ $row->numero_arbol }}</td>
					<td>{{ $row->id_coordenada }}</td>
					<td>{{ $row->id_especie }}</td>
					<td>{{ $row->id_forma_biologica }}</td>
					<td>{{ $row->id_forma_fuste }}</td>
	                <td>{{ $row->id_condicion }}</td>
					<td><a href="{{ route('caracteristica_arbolado.edit', $row->id) }}">Editar</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	    {!! $grid->render() !!}
	</div>

@endsection
