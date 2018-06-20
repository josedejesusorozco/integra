<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Integra</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

<div class="container-fluid" name="contenido"><!-- página -->
    <div class="row content" name="fila-contenido"><!-- fila de la página -->

<!-- Menú vertical -->
        <div class="col-md-3">
            <nav class="navbar navbar-left">
                <br>
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Archivo</a>
                </div>
                <div class="navbar-text">
                    @if (Session::get('fileName'))
                        {{ Session::get('fileName') }}
                    @endif
                </div>
                <p>
                    {!! Form::open(array('url'=>'upload','method'=>'POST', 'files'=>true, 'id' => 'form-sqlite')) !!}
                    <span class="btn btn-default btn-file btn-info active">
                        <!--https://www.youtube.com/watch?v=PjEutNUZjj0-->
                        &nbsp;&nbsp;Subir archivo&nbsp;&nbsp;
                        {!! Form::file('file', array('onchange'=>'submit();','accept' => '.sqlite, .txt')) !!}
                    </span>
                        {!! Form::close() !!}
                </p>
                
                <br>
                <a href="analisis" class="btn btn-primary" role="button" aria-pressed="true">Analizar archivo</a>
                <br>
                <br>
                <a href="proceso" class="btn btn-warning" role="button" aria-pressed="true">Procesa archivo</a>
                <br>
                <br>
                <a href="conglomerados" class="btn btn-success" role="button" aria-pressed="true">&nbsp;Insertar en BD&nbsp;</a>
                <p>
                    <div class="form-check">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" class="form-check-input" @if (Session::get('checked') == "true") <?php echo 'checked="checked"'; ?> @endif OnChange="activaDesactivaFiltro(this.checked);" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Mostrar sólo registros con error</label>
                        <!--checked="checked"-->
                    </div>
                </p>
                <p>                        
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Tablas</a>
                    </div>
                </p>
                <p>
                    <div class="row-content">
                        
                        <div class="nav">
                            @if (Session::get('tablas'))
                                <?php $tablas = Session::get('tablas'); ?>
                                <div class="list-group" id="list-tab">
                                    @foreach ($tablas as $row)
                                        <a class="list-group-item list-group-item-action" id="list-{{$row["tabla"]}}" href="{{route($row["ruta"] . '.index')}}" role="tab" aria-controls="home">
                                            {{$row["ruta"]}}
                                            <span class="badge badge-primary badge-pill">
                                                <?php if($row["errores"]) echo $row["errores"]; ?>
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </p>
            </nav>
        </div>
<!-- Fin menú vertical -->
        <div class="col-md-9"> <!-- contenido grid -->
            <div class="container-fluid"> <!-- contenido -->
<!-- Header -->
                <br>
                <div class="row visible-lg text-right">
                    <div class="container-fluid text-center">
                        <img src="{{ asset('img/conafor_170px.jpg') }}" class="img-logo">
                        <img src="{{ asset('img/usaid_170px.jpg') }}" class="img-logo">
                        <img src="{{ asset('img/forestservice_170px.jpg') }}" class ="img-logo">
                    </div>
                </div>
                <div class="row visible-md text-center">
                    <div class="container-fluid text-center">
                        <img src="{{ asset('img/conafor_170px.jpg') }}" class="img-logo-md">
                        <img src="{{ asset('img/usaid_170px.jpg') }}" class="img-logo-md">
                        <img src="{{ asset('img/forestservice_170px.jpg') }}" class ="img-logo-md">
                    </div>
                </div>
                <div class="row visible-sm text-right">
                    <div class="container-fluid text-center">
                        <img src="{{ asset('img/conafor_170px.jpg') }}" class="img-logo-sm">
                        <img src="{{ asset('img/usaid_170px.jpg') }}" class="img-logo-sm">
                        <img src="{{ asset('img/forestservice_170px.jpg') }}" class ="img-logo-sm">
                    </div>
                </div>
                <div class="row visible-xs text-center">
                    <div class="container-fluid text-center">
                        <img src="{{ asset('img/conafor_170px.jpg') }}" class="img-logo-xs">
                        <img src="{{ asset('img/usaid_170px.jpg') }}" class="img-logo-xs">
                        <img src="{{ asset('img/forestservice_170px.jpg') }}" class ="img-logo-xs">
                    </div>
                </div>
                <div class="row">
                    <h1 class="page-header text-muted text-center">Migración de INFyS 2015</h1>
                </div>
<!-- Fin del header -->
                <?php echo (session()->has('data')) ? "TRUE" : "";?>
<!-- Contenido -->
                <div class="row-content">
                    @yield('content')
                </div>
<!-- Fin del contenido -->

            </div><!-- Fin de contenido -->
        </div><!-- Fin de contenido grid -->
    </div><!-- Fin de fila de la página -->
</div><!-- Fin de página -->
</body>
</html>