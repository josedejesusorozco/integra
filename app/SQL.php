<?php

namespace integra;

use Illuminate\Database\Eloquent\Model;
use integra\SQLite;
use DB;
use Session;
use DateTime;

class SQL extends Model
{
    public static function conglomerados() {

    	/*https://richos.gitbooks.io/laravel-5/content/capitulos/chapter12.html*/
    	
    	return SQLite::conglomerados();
    	//return DB::connection('sqlite2')->table('Sistema_Caracteristica_punto_control')->get();
    }

    public static function existeConglomerado($folio) {
    	
    	return DB::connection('sqlite2')
    			->table('Sistema_unidad_muestreo AS u')
				->where('u.id_unidad_muestreo_padre', '0')
				->where('u.folio', $folio)
				->select('u.id AS id_unidad_muestreo')
				->first();
    }

    public static function insertaUnidad($id) {

    	//$cgl = SQLite::infoConglomerado($folio);
    	$registro = SQLite::infoUnidad($id);

    	DB::connection('sqlite2')
			->table('Sistema_unidad_muestreo')
			->insert([
				'id' 						=> $registro->id,
				'folio' 					=> $registro->folio,
				'id_proyecto' 				=> $registro->id_proyecto,
				'id_municipio' 				=> $registro->id_municipio,
				'id_unidad_muestreo_padre' 	=> $registro->id_unidad_muestreo_padre,
				'predio' 					=> $registro->predio,
				'id_tipo_unidad_muestreo' 	=> $registro->id_tipo_unidad_muestreo,
				'id_medicion' 				=> $registro->id_medicion,
				'id_tipo_unidad_muestreo' 	=> $registro->id_tipo_unidad_muestreo,
				'estatus' 					=> $registro->estatus,
				'tiene_cubierta_vegetal' 	=> $registro->tiene_cubierta_vegetal
			]);

		SQL::insertaLevantamiento($id);

		$sub = SQLite::descendientesUnidad($id);

		foreach ($sub as $row) {

			SQL::insertaUnidad($row->id);
		}

    }

    public static function insertaLevantamiento($id_unidad) {

    	$registro = SQLite::infoLevantamiento($id_unidad);

    	//dd($registro);
    	//dd(SQL::validaFecha('19-02-2015'));

    	DB::connection('sqlite2')
			->table('Sistema_levantamiento')
			->insert([
				'id_unidad_muestreo' 				=> $registro->id_unidad_muestreo,
				'id_coordenada' 					=> $registro->id_coordenada,
				'id_coordenada_apoyo' 				=> $registro->id_coordenada_apoyo,
				'id_coordenada_punto_control' 		=> $registro->id_coordenada_punto_control,
				'fecha_ejecucion' 					=> $registro->fecha_ejecucion,
				'anio_levantamiento' 				=> $registro->anio_levantamiento,
				'id_tipo_levantamiento' 			=> $registro->id_tipo_levantamiento,
				'id_regimen_propiedad' 				=> $registro->id_regimen_propiedad,
				'id_brigadista' 					=> $registro->id_brigadista,
				'observaciones' 					=> $registro->observaciones,
				'id_vegetacion_primaria' 			=> $registro->id_vegetacion_primaria,
				'id_vegetacion_secundaria' 			=> $registro->id_vegetacion_secundaria,
				'id_region_hidrologica' 			=> $registro->id_region_hidrologica,
				'id_carta_cartografica' 			=> $registro->id_carta_cartografica,
				'id_condicion_levantamiento' 		=> $registro->id_condicion_levantamiento,
				'condicion_encontrada_vegetacion' 	=> $registro->condicion_encontrada_vegetacion,
				'tipo_acceso' 						=> $registro->tipo_acceso,
				'accesibilidad' 					=> $registro->accesibilidad,
				'paraje' 							=> $registro->paraje,
				'id_exposicion' 					=> $registro->id_exposicion,
				'id_fisiografia' 					=> $registro->id_fisiografia,
				'id_uso_suelo' 						=> $registro->id_uso_suelo,
				'estatus' 							=> $registro->estatus,
				'id_fisonomia' 						=> $registro->id_fisonomia,
				'tiene_cubierta_vegetal' 			=> $registro->tiene_cubierta_vegetal,
				'id_tipo_unidad_muestreo' 			=> $registro->id_tipo_unidad_muestreo,
				'tipificacion' 						=> $registro->tipificacion,
				'estatus_muestreado' 				=> $registro->estatus_muestreado,
				'situacion' 						=> $registro->situacion,
				'pendiente' 						=> $registro->pendiente,
				'altitud' 							=> $registro->altitud,
				'predio' 							=> $registro->predio,
				'fecha_inicio' 						=> SQL::validaFecha($registro->fecha_inicio),
				'fecha_fin' 						=> SQL::validaFecha($registro->fecha_fin),
				'id_anterior' 						=> $registro->id
			]);

		//SQL::insertaSatelites($id_unidad);
    }

    public static function insertaSatelites() {

    	$tablas = Session::get('tablas');
    	$query = "attach '" . public_path('/db/') . "database.sqlite' AS infys;";
    	DB::connection('sqlite2')->select($query);

    	foreach ($tablas as $registro) {

    		if($registro['estructura'] <> 'hijo') {

    			SQL::insertaSatelite($registro["tabla"]);
    		} else {

    			SQL::insertaSateliteHijo($registro["tabla"], $registro["tabla_relacion"], $registro["campo_relacion"]);
    		}
		}

		//dd('Hecho');
    }

    public static function insertaSatelite($tabla) {
    	
    	$estructura = Session::get($tabla);
    	unset($estructura[0]); //Borrando el campo id para que no se inserte
    	unset($estructura[1]); //Borrando el campo id_levantamiento para que pueda ser reemplazado por el nuevo id_levantamiento

    	$insert = "INSERT INTO main.$tabla";
		$campos = " (id_levantamiento";
    	$query_part1 = "SELECT ";
		$valores = "l2.id_levantamiento";
    	$query_part2 = "
					FROM
						infys.$tabla t
					INNER JOIN
						infys.Sistema_levantamiento l ON (l.id = t.id_levantamiento)
					INNER JOIN
						infys.Sistema_unidad_muestreo u ON(u.id = l.id_unidad_muestreo)
					LEFT JOIN
						(
						SELECT
							l.id AS id_levantamiento
							, l.id_anterior AS id_levantamiento_anterior
							, l.id_unidad_muestreo
						FROM
							main.Sistema_levantamiento l
						INNER JOIN
							main.Sistema_unidad_muestreo u ON(u.id = l.id_unidad_muestreo)
						) l2
						ON(l2.id_levantamiento_anterior = l.id AND l2.id_unidad_muestreo = u.id)";
    	
		foreach ($estructura as $est) {

			$campos .= ", " . $est["campo"];
			$valores .= ", t." . $est["campo"];
		}

		$campos .= ', conglomerado, sitio, id_anterior) ';
		$valores .= ', t.conglomerado, t.sitio, t.id_anterior';

		//$valores = trim($valores, ',');

		//dd($insert . $campos . $query_part1 . $valores . $query_part2);

		DB::connection('sqlite2')->insert($insert . $campos . $query_part1 . $valores . $query_part2);
    }

    public static function insertaSateliteHijo($tabla, $tabla_relacion, $campo_relacion) {
    	
    	$estructura = Session::get($tabla);
    	unset($estructura[0]); //Borrando el campo id para que no se inserte
    	unset($estructura[1]); //Borrando el campo id de la tabla padre para que pueda ser reemplazado por el nuevo id

    	$insert = "INSERT INTO main.$tabla";
		$campos = " ($campo_relacion";
    	$query_part1 = "SELECT ";
		$valores = "nuevo.id_tabla_relacion";
    	$query_part2 = "
    				FROM
						infys.$tabla hijo
					INNER JOIN
						infys.$tabla_relacion t ON(t.id = hijo.$campo_relacion)
					INNER JOIN
						infys.Sistema_levantamiento l ON (l.id = t.id_levantamiento)
					LEFT JOIN (
						SELECT
							t.id AS id_tabla_relacion,
							l.id_unidad_muestreo,
							t.id_anterior AS id_tabla_relacion_anterior
						FROM
							main.$tabla_relacion t
						INNER JOIN
							main.Sistema_levantamiento l ON(l.id = t.id_levantamiento)
						) AS nuevo ON(nuevo.id_unidad_muestreo = l.id_unidad_muestreo AND nuevo.id_tabla_relacion_anterior = t.id)";
    	
		foreach ($estructura as $est) {

			$campos .= ", " . $est["campo"];
			$valores .= ", hijo." . $est["campo"];
		}

		$campos .= ', id_anterior) ';
		$valores .= ', hijo.id';
		//$valores = trim($valores, ','); //Quitando la coma del final

		DB::connection('sqlite2')->insert($insert . $campos . $query_part1 . $valores . $query_part2);
    }

    public static function borraSatelites($id_conglomerado) {

    	$tablas = Session::get('tablas');
    	$levantamientos = SQL::levantamientosCgl($id_conglomerado);

    	foreach ($tablas as $registro) {

    		$result = DB::connection('sqlite2') 
	    				->table($registro["tabla"])
	                    ->whereIn('id_levantamiento', $levantamientos)
	                    ->delete();
	        //dd($result);
		}

		//dd('Hecho');
    }

    public static function levantamientosCgl($id_conglomerado) {

    	$tablas = Session::get('tablas');
    	$query = "
					SELECT
						id AS id_levantamiento
					FROM
						Sistema_levantamiento
					WHERE
						id_unidad_muestreo IN(
							SELECT
								$id_conglomerado AS id

							UNION ALL

							SELECT
								u.id
							FROM
								Sistema_unidad_muestreo u
							WHERE
								id_unidad_muestreo_padre = $id_conglomerado

							UNION ALL

							SELECT
								u.id
							FROM
								Sistema_unidad_muestreo u
							WHERE
								id_unidad_muestreo_padre IN(
									SELECT
										u.id
									FROM
										Sistema_unidad_muestreo u
									WHERE
										id_unidad_muestreo_padre = $id_conglomerado)
							)";

    	$levantamientos = DB::connection('sqlite2')->select($query);

    	$arraylevantamientos = [];

    	foreach ($levantamientos as  $fila) {
			array_push($arraylevantamientos, $fila->id_levantamiento);
		}

		return $arraylevantamientos;
    }

    //INSERT SELECT Eloquent
    //https://stackoverflow.com/questions/25533608/create-a-insert-select-statement-in-laravel
    //https://laracasts.com/discuss/channels/eloquent/insert-to-data-base-on-the-fly-from-dynamic-content?page=1
    //https://stackoverflow.com/questions/6824717/sqlite-how-do-you-join-tables-from-different-databases
    public static function insertSelect($tabla) {

		$select = DB::connection('sqlite2')
					->table('infys.' . $tabla);

		$bindings = $select->getBindings();

		$insertQuery = 'INSERT INTO main. ' . $tabla . ' ' . $select->toSql();

		//dd($insertQuery);
 		
 		DB::connection('sqlite2')
 					->insert($insertQuery, $bindings);
    }

    public static function insertaSatelites_old() {

    	/*$levantamiento = SQL::infoLevantamiento($id_unidad);
    	$lev_ant = SQLite::infoLevantamiento($id_unidad);*/
    	//DB::connection('sqlite2')->select('detach infys;');
    	$tablas = Session::get('tablas');
    	$query = "attach '" . public_path('/db/') . "database.sqlite' AS infys;";
    	DB::connection('sqlite2')->select($query);

    	foreach ($tablas as $registro) {

    		SQL::insertSelect($registro["tabla"]);
    		//SQL::insertaSatelite($registro["tabla"]);
		}
    }

    public static function insertaSatelite_old($tabla) {
    	
    	$estructura = Session::get($tabla);
    	$datos = (array) SQLite::getSatelite($tabla);

    	foreach ($datos as $key => $registro) {
    		
    		$query = "INSERT INTO " . $tabla . " VALUES (";
    		
    		foreach ($estructura as $est) {

    			$query .= $registro["id"];
    			$query .= ',';
    		}

    		//$query = trim($query, ','); //Quitando la coma extra
    		$query .= ')';

    		dd($query);
    	}
    }

    public static function borraUnidad($id) {

		$sub = SQLite::descendientesUnidad($id);

		foreach ($sub as $row) {

			SQL::borraUnidad($row->id);
		}

		SQL:: borraLevantamiento($id);

    	DB::connection('sqlite2')
			->table('Sistema_unidad_muestreo')
			->where('id', $id)
			->delete();

    }

    public static function borraLevantamiento($id_unidad) {


    	//SQL::borraSatelites(SQL::idLevantamiento($id_unidad));

    	DB::connection('sqlite2')
			->table('Sistema_levantamiento')
			->where('id_unidad_muestreo', $id_unidad)
			->delete();

    }

    public static function idLevantamiento($id_unidad) {
    	
    	return DB::connection('sqlite2')
    			->table('Sistema_levantamiento')
				->where('id_unidad_muestreo', $id_unidad)
				->select('id AS id_levantamiento')
				->first();
    }

    public static function infoLevantamiento($id_unidad) {
    	
    	return DB::connection('sqlite2')
    			->table('Sistema_levantamiento')
				->where('id_unidad_muestreo', $id_unidad)
				->first();
    }

    // http://php.net/manual/es/function.checkdate.php
    public static function validaFecha($fecha, $formato = 'Y/m/d') {

    	if (strtotime($fecha))
    		return date_format(date_create($fecha), 'Y/m/d');

    	return NULL;
	}

    /*public Static function insertaConglomerado($folio) {

    	$cgl = SQLite::infoConglomerado($folio);

    	$result = DB::connection('sqlite2')
					->table('Sistema_unidad_muestreo')
					->insert([
						'id' 						=> $cgl->id,
						'folio' 					=> $cgl->folio,
						'id_proyecto' 				=> $cgl->id_proyecto,
						'id_municipio' 				=> $cgl->id_municipio,
						'id_unidad_muestreo_padre' 	=> $cgl->id_unidad_muestreo_padre,
						'predio' 					=> $cgl->predio,
						'id_tipo_unidad_muestreo' 	=> $cgl->id_tipo_unidad_muestreo,
						'id_medicion' 				=> $cgl->id_medicion,
						'id_tipo_unidad_muestreo' 	=> $cgl->id_tipo_unidad_muestreo,
						'estatus' 					=> $cgl->estatus,
						'tiene_cubierta_vegetal' 	=> $cgl->tiene_cubierta_vegetal
					]);
    }*/

    /*public static function insertaLevantamiento_bla_bla($id) {

    	//$cgl = SQLite::infoConglomerado($folio);
    	$registro = SQLite::infoUnidad($id);

    	DB::connection('sqlite2')
			->table('Sistema_unidad_muestreo')
			->insert([
				'id' 						=> $registro->id,
				'folio' 					=> $registro->folio,
				'id_proyecto' 				=> $registro->id_proyecto,
				'id_municipio' 				=> $registro->id_municipio,
				'id_unidad_muestreo_padre' 	=> $registro->id_unidad_muestreo_padre,
				'predio' 					=> $registro->predio,
				'id_tipo_unidad_muestreo' 	=> $registro->id_tipo_unidad_muestreo,
				'id_medicion' 				=> $registro->id_medicion,
				'id_tipo_unidad_muestreo' 	=> $registro->id_tipo_unidad_muestreo,
				'estatus' 					=> $registro->estatus,
				'tiene_cubierta_vegetal' 	=> $registro->tiene_cubierta_vegetal
			]);

    }*/
}
