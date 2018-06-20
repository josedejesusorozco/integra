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

<!-- Menú horizontal -->
    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="#">Logo</a>-->
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Variables</a></li>
                    <li><a href="#">Insumos</a></li>
                    <li><a href="#">Estimación</a></li>
                    <li><a href="#">Gráficas</a></li>
                </ul>
            </div>
        </div>
    </nav>
<!-- Fin menú horizontal -->

    <div class="container-fluid" name="contenido"><!-- página -->
        <div class="row content" name="fila-contenido"><!-- fila de la página -->

<!-- Menú vertical -->
            <div class="col-sm-3 col-md-2 hidden-xs menu-left">
                <nav class="navbar navbar-inverse navbar-left">
                        <p>                        
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#">Plataforma Informática de Monitoreo Forestal </a>
                            </div>
                        </p>
                        <br>
                        <p>
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Insumos</a></li>
                                <li><a href="#">Estimación</a></li>
                                <li><a href="#">Gráficas</a></li>
                            </ul>
                        </p>
                        {!! Form::open(array('url'=>'upload','method'=>'POST', 'files'=>true, 'id' => 'form-sqlite')) !!}
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="btn btn-default btn-file btn-info">
                                <!--https://www.youtube.com/watch?v=PjEutNUZjj0-->
                                Subir archivo
                                {!! Form::file('file', array('onchange'=>'submit();','accept' => '.sqlite, .txt')) !!}
                            </span>
                
                        {!! Form::close() !!}
                </nav>
            </div>
<!-- Fin menú vertical -->
            <div class="col-xs-12 col-sm-9 col-md-10"> <!-- contenido grid -->
                <div class="container-fluid"> <!-- contenido -->
<!-- Header -->
                    <div class="row visible-lg text-right">
                        <div class="container-fluid text-center">
                            <img src="img/conafor_170px.jpg" class="img-logo">
                            <img src="img/usaid_170px.jpg" class="img-logo">
                            <img src="img/forestservice_170px.jpg" class ="img-logo">
                        </div>
                    </div>
                    <div class="row visible-md text-center">
                        <div class="container-fluid text-center">
                            <img src="img/conafor_170px.jpg" class="img-logo-md">
                            <img src="img/usaid_170px.jpg" class="img-logo-md">
                            <img src="img/forestservice_170px.jpg" class ="img-logo-md">
                        </div>
                    </div>
                    <div class="row visible-sm text-right">
                        <div class="container-fluid text-center">
                            <img src="img/conafor_170px.jpg" class="img-logo-sm">
                            <img src="img/usaid_170px.jpg" class="img-logo-sm">
                            <img src="img/forestservice_170px.jpg" class ="img-logo-sm">
                        </div>
                    </div>
                    <div class="row visible-xs text-center">
                        <div class="container-fluid text-center">
                            <img src="img/conafor_170px.jpg" class="img-logo-xs">
                            <img src="img/usaid_170px.jpg" class="img-logo-xs">
                            <img src="img/forestservice_170px.jpg" class ="img-logo-xs">
                        </div>
                    </div>
                    <div class="row">
                        <h1 class="page-header text-muted text-center">Migración de INFyS 2015</h1>
                    </div>
<!-- Fin del header -->

<!-- Contenido -->

<!--<script>
    function desapareceBoton(checado) {
        if(checado) {
            $('#desapareseme').hide();
        } else {
            $('#desapareseme').show();

        }
    }
                    </script>-->
                     <!--<div class="form-check">
                        <input type="checkbox" class="form-check-input" OnChange="desapareceBoton(this.checked);" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Desaparecer</label>
                      </div>
                    <button type="button" class="btn btn-primary" id="desapareseme">Boton</button>-->
                    <!--<script>
                        if(<?php echo (session()->has('data')) ? "TRUE" : "FALSE";?>) {alert('hey');}
                    </script>-->
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
											<th>diametro_altura_pecho</th>
											<th>altura_total</th>
											<th>altura_fuste_limpio</th>
											<th>altura_comercial</th>
											<th>diametro_copa</th>
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
											<td>{{ $row->diametro_altura_pecho }}</td>
											<td>{{ $row->altura_total }}</td>
											<td>{{ $row->altura_fuste_limpio }}</td>
											<td>{{ $row->altura_comercial }}</td>
											<td>{{ $row->diametro_copa }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
                    </div>
<!-- Fin del contenido -->

                </div><!-- Fin de contenido -->
            </div><!-- Fin de contenido grid -->
        </div><!-- Fin de fila de la página -->
    </div><!-- Fin de página -->
</body>
</html>