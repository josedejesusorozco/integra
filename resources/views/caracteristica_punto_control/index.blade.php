@extends('layout')

@section('content')

	<div class="col-xs-12">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>id_levantamiento</th>
					<th>id_coordenada</th>
					<th>id_condicion_acceso</th>
					<th>paraje</th>
				</tr>
			</thead>
			<tbody>
				@foreach($grid AS $row)
				<tr>
					<td>{{ $row->id }}</td>
					<td>{{ $row->id_levantamiento }}</td>
					<td>{{ $row->id_coordenada }}</td>
					<td>{{ $row->id_condicion_acceso }}</td>
					<td>{{ $row->paraje }}</td>
					<td><a href="{{ route('caracteristica_punto_control.edit', $row->id) }}">Editar</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	    {!! $grid->render() !!}
	</div>

@endsection
