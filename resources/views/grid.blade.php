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
<!-- Contenido -->
                    <div class="row-content">
						<div class="row">
							<div class="col-xs-12">
								<h2 class="page-header text-center">CRUD Arboles</h2>
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
										@foreach($test AS $row)
										<tr>
											<td>{{ $row->id }}</td>
											<td>{{ $row->id_levantamiento }}</td>
											<td>{{ $row->numero_arbol }}</td>
											<td>{{ $row->id_coordenada }}</td>
											<td>{{ $row->id_especie }}</td>
											<td>{{ $row->id_forma_biologica }}</td>
											<td>{{ $row->id_forma_fuste }}</td>
                                            <td>{{ $row->id_condicion }}</td>
											<td><a href="{{ route('grid.edit', $row->id) }}">Editar</a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
                                {!! $test->render() !!}
							</div>
						</div>
                    </div>
<!-- Fin del contenido -->

</body>
</html>