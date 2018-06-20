<?php

namespace integra;
use Excel;

use Illuminate\Database\Eloquent\Model;

class Estructura extends Model
{
	public $tablas = Array();
	public $campos = Array();

	public function __construct()
    {
        $this->campos();
        $this->tablas();
    }

    private function campos() {

    	$tabla = Array();

    	$path = public_path('/db/EstructuraTablas.xlsx');

    	$data = Excel::selectSheets('Campos')->load($path, function($reader) {})->get();

    	foreach ($data as $key => $value) {
			$tabla[] = [
				'tabla' => $value->tabla,
				'estructura' => $value->estructura,
				'campo' => $value->campo,
				'tipo' => $value->tipo,
				'longitud' => $value->longitud,
				'tipo_rev' => $value->tipo_rev
			];
		}

		$this->campos = $tabla;

		//return $tabla;
    }

    private function tablas() {

    	$tabla = Array();

    	$path = public_path('/db/EstructuraTablas.xlsx');

    	$data = Excel::selectSheets('Tablas')->load($path, function($reader) {})->get();

    	//$data->groupBy('tabla');

    	foreach ($data as $key => $value) {
			$tabla[] = [
				'tabla' => $value->tabla,
				'estructura' => $value->estructura,
				'ruta' => $value->ruta,
				'tabla_relacion' => $value->tabla_relacion,
				'campo_relacion' => $value->campo_relacion
			];
		}

		$this->tablas = $tabla;
    }
}
