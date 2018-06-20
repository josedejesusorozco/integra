<?php

namespace integra\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Collection;
use integra\Caracteristica_repoblado;
use integra\Http\Requests\Caracteristica_repoblado_request;

class Caracteristica_repoblado_controller extends Controller
{
	private $vista = 'caracteristica_repoblado';
	private $tabla = 'Satelites_caracteristica_repoblado';
	private $modelo;

	public function __construct() {
		
		$this->modelo = 'integra\\' . $this->vista;
    }

    public function index() {
    	
    	//$ids_error = $this->TraeCuentaErroresTabla();
    	$ids_error = Session::get($this->tabla . '_errores');

    	if(Session::get('checked') == "true") {
    		$grid = $this->modelo::orderBy('id', 'ASC')->whereIn('id', $ids_error)->paginate();
    	}
    	else
    		$grid = $this->modelo::orderBy('id', 'ASC')->paginate();

    	return view($this->vista . '.index', compact('grid'));
    }

    public function edit($id) {

    	$est = new SQLiteController();
		$arrayErrores = $est->CamposConError($this->tabla, $id);

    	$registro = $this->modelo::find($id);
    	return view($this->vista . '.edit', compact('registro'))->with('errores', $arrayErrores);
    }

    public function update(Caracteristica_repoblado_request $request, $id) {
    	
    	$registro = $this->modelo::find($id);

    	$registro->tipo_repoblado =        $request->tipo_repoblado;
    	$registro->nombre_comun =          $request->nombre_comun;
    	$registro->numero_colecta =        $request->numero_colecta;
    	$registro->frecuencia =            $request->frecuencia;
        $registro->edad =                  $request->edad;
    	$registro->porcentaje_cobertura =  $request->porcentaje_cobertura;

    	$registro->save();

    	return redirect()->route($this->vista . '.index')->with('info', 'Actualizado');
    }

    /*private function TraeCuentaErroresTabla() {


    	foreach (Session::get('tablas') as $key => $value) {

    		if($value["tabla"] == $this->tabla) {

				$list = [];

				foreach($value["ids_errores"] as $key => $val ){ //convirtiendo en lista los valores, ya que vienen de la forma key => value
					array_push($list, $val->id);
				}
    			return $list;
    		}
    	}

    	return null;
    }*/
}
