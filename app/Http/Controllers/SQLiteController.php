<?php

namespace integra\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use integra\Estructura;

class SQLiteController extends Controller
{
	private $campos;
	private $tablas;

	public function __construct() {
    	$est = new Estructura();
    	$this->campos = $est->campos;
    	$this->tablas = $est->tablas;
    }

    /*public function ValidaEstructura() {

    	$cuenta = 0;

    	foreach ($this->tablas as $key => $value) {

    		if(!$this->CheckIfColumnExists($value["tabla"], "conglomerado"))
    			$cuenta++;
    		if($value["estructura"] == "sitio" || $value["estructura"] == "subsitio") {
    			if(!$this->CheckIfColumnExists($value["tabla"], "sitio"))
    			$cuenta++;
    		}
		}

		return $cuenta;
    }*/

    public function ArreglaEstructura() {

    	foreach ($this->campos as $key => $value) {

    		if(!$this->CheckIfColumnExists($value["tabla"], "conglomerado")) {
    			$this->CreaColumna($value["tabla"], "conglomerado");
    		}

    		/*if($value["estructura"] == "sitio" || $value["estructura"] == "subsitio") {*/
			if(!$this->CheckIfColumnExists($value["tabla"], "sitio")) {
				$this->CreaColumna($value["tabla"], "sitio");
			}
    		//}
    		
    		if(!$this->CheckIfColumnExists($value["tabla"], "id_anterior")) {
    			$this->CreaColumna($value["tabla"], "id_anterior");
    		}

    		$this->InsertaDatos($value["estructura"] , $value["tabla"]);
		}
    }

    private function CheckIfColumnExists($tabla, $columna) {

    	$query = "PRAGMA table_info($tabla)";
    	
    	foreach(DB::SELECT($query) as $key => $value){
    		if($value->name == $columna)
    			return true;
    	}

    	return false;
    }

    private function CreaColumna($tabla, $columna) {

    	$query = "ALTER TABLE " . $tabla . " ADD " . $columna . " INT NULL;";
    	DB::SELECT($query);
    }

    /*-------------------------------------------------------------------------------
    Aquí se inserta en todas las tablas el Conglomerado y el Sitio
    -------------------------------------------------------------------------------*/
   
    private function InsertaDatos($estructura, $tabla) {

    	$query = "";

    	if($estructura == "conglomerado") {

	    	$query = "
				UPDATE
					$tabla
				SET
					conglomerado =
					(
						SELECT
							u.folio AS conglomerado
						FROM
							 $tabla t
						LEFT JOIN
							Sistema_levantamiento l ON(l.id = t.id_levantamiento)
						LEFT JOIN
							Sistema_unidad_muestreo u ON(u.id = l.id_unidad_muestreo)
						WHERE
							 $tabla.id = t.id
					)
	    	";
    	} else if($estructura == "sitio") {

	    	$query = "
				UPDATE
					$tabla
				SET
					conglomerado =
					(
						SELECT
							u.folio AS conglomerado
						FROM
							 $tabla  t
						LEFT JOIN
							Sistema_levantamiento ls ON(ls.id = t.id_levantamiento)
						LEFT JOIN
							Sistema_unidad_muestreo us ON(us.id = ls.id_unidad_muestreo)
						LEFT JOIN
							Sistema_unidad_muestreo u ON(u.id = us.id_unidad_muestreo_padre)
						WHERE
							 $tabla.id = t.id
					)
					, sitio =
					(
						SELECT
						   us.folio AS sitio
						FROM
							 $tabla  t
						LEFT JOIN
							Sistema_levantamiento ls ON(ls.id = t.id_levantamiento)
						LEFT JOIN
							Sistema_unidad_muestreo us ON(us.id = ls.id_unidad_muestreo)
						LEFT JOIN
							Sistema_unidad_muestreo u ON(u.id = us.id_unidad_muestreo_padre)
						WHERE
							 $tabla.id = t.id
					)
	    	";
    		
    	} else if($estructura == "subsitio") {

	    	$query = "
				UPDATE
					$tabla
				SET
					conglomerado =
					(
						SELECT
							u.folio AS conglomerado
						FROM
							 $tabla  t
						LEFT JOIN
							Sistema_levantamiento lss ON(lss.id = t.id_levantamiento)
						LEFT JOIN
							Sistema_unidad_muestreo uss ON(uss.id = lss.id_unidad_muestreo)
						LEFT JOIN
							Sistema_unidad_muestreo us ON(us.id = uss.id_unidad_muestreo_padre)
						LEFT JOIN
							Sistema_unidad_muestreo u ON(u.id = us.id_unidad_muestreo_padre)
						WHERE
							 $tabla.id = t.id
					)
					, sitio =
					(
						SELECT
						   us.folio AS sitio
						FROM
							 $tabla  t
						LEFT JOIN
							Sistema_levantamiento lss ON(lss.id = t.id_levantamiento)
						LEFT JOIN
							Sistema_unidad_muestreo uss ON(uss.id = lss.id_unidad_muestreo)
						LEFT JOIN
							Sistema_unidad_muestreo us ON(us.id = uss.id_unidad_muestreo_padre)
						WHERE
							 $tabla.id = t.id
					)
	    	";
    		
    	}
    			
		if($query <> "") {

			$query .= ", id_anterior = id";
			DB::UPDATE($query);
		}

    }
    
    /*---------------------------------------------------------------------------------------------
    Esta función analiza cada una de las tablas del excel con la descripción de la base de datos,
    para encontrar los errores de tipo de cada tabla
    ---------------------------------------------------------------------------------------------*/
    
    public function BuscaErrores() {

    	$cuenta = 0;

    	foreach ($this->tablas as $key => $value) {

    		$query = "";
    		$arrayTabla = [];	//Se guardará en sesión un array por cada tabla con la descripción de sus campos
    		$arrayErrores = [];	//Se guardará en sesión un array por cada tabla con los id de los registros con error

    		while ($cuenta < sizeof($this->campos) && $value["tabla"] == $this->campos[$cuenta]["tabla"]) {

    			$tabla = $value["tabla"];
    			$campo = $this->campos[$cuenta]["campo"];
    			$tipo_rev = $this->campos[$cuenta]["tipo_rev"];
    			$longitud = $this->campos[$cuenta]["longitud"];

    			if ($query <> "") {
    				$query .= "
    					UNION
    				";
    			}

				$query .= "
					SELECT id FROM
						$tabla
					WHERE
						$campo IS NOT NULL
						AND $campo NOT LIKE ''
						AND typeof($campo) NOT LIKE '$tipo_rev'";

				if(strtolower($tipo_rev) == 'real') { //SQLite marca como enteros los numeros que no tengan decimales aunque el campo sea del tipo real
					$query .= "
						AND typeof($campo) NOT LIKE 'integer'";
				}

    			$cuenta ++;

    			$valores = array(
    				'campo' => $campo,
    				'tipo' => $tipo_rev,
    				'longitud' => $longitud
    			);

    			$arrayTabla[] = $valores;
    		}

    		$this->tablas[$key]["errores"] = sizeof(DB::SELECT($query));
			//$this->tablas[$key]["ids_errores"] = DB::SELECT($query);
			$errores = DB::SELECT($query);

			foreach ($errores as  $fila) {
				array_push($arrayErrores, $fila->id);
			}

			Session::put($value["tabla"], $arrayTabla);	//Guardando en sesión el array con la descripción de los campos de la tabla
			Session::put($value["tabla"] . "_errores", $arrayErrores);	//Guardando en sesión el array con la lista de los id de los registros con error
    	}

    	return $this->tablas;
    }

    public function CamposConError($tabla, $id) {

    	$arrayCampos = [];
    	
    	foreach (Session::get($tabla) as $key => $fila) {
    		
    		$campo = $fila["campo"];
    		$tipo = $fila["tipo"];

			$query = "
				SELECT id FROM
					$tabla
				WHERE
					$campo IS NOT NULL
					AND $campo NOT LIKE ''
					AND typeof($campo) NOT LIKE '$tipo'
					AND id = $id ";
			
			$result = DB::SELECT($query);

			if($result)
    			$arrayCampos[] = $campo;
    	}

    	return $arrayCampos;
    }
}
