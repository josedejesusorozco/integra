<?php

namespace integra;

use Illuminate\Database\Eloquent\Model;
use DB;

class SQLite extends Model
{
    public static function conglomerados() {

    	return DB::table('Sistema_unidad_muestreo AS u')
				->join('Sistema_levantamiento AS l', 'l.id_unidad_muestreo', '=', 'u.id')
				->join('Satelites_caracteristica_condicion_levantamiento AS cl', 'cl.id_levantamiento', '=', 'l.id')
				->where('u.id_unidad_muestreo_padre', '0')
				->select('u.*')
				->get();
    }

    public static function infoConglomerado($folio) {

    	return DB::table('Sistema_unidad_muestreo')
					->where('folio', $folio)
					->first();
					//->get()
					//->toArray();
    }

    public static function infoUnidad($id) {

    	return DB::table('Sistema_unidad_muestreo')
					->where('id', $id)
					->first();
					//->get()
					//->toArray();
    }

    public static function descendientesUnidad($id) {

    	return DB::table('Sistema_unidad_muestreo')
					->where('id_unidad_muestreo_padre', $id)
					->select('id')
					->orderBy('id', 'asc')
					->get();
    }

    public static function infoLevantamiento($id_unidad) {

    	return DB::table('Sistema_levantamiento')
					->where('id_unidad_muestreo', $id_unidad)
					->first();
					//->get()
					//->toArray();
    }

    public static function idLevantamiento($id_unidad) {
    	
    	$levantamiento = DB::table('Sistema_levantamiento')
							->where('id_unidad_muestreo', $id_unidad)
							->select('id AS id_levantamiento')
							->first();

		return $levantamiento->id;
    }

    public static function getSatelite($tabla) {

    	return DB::table($tabla)->get();
    }
}
