<?php

namespace integra;

use Illuminate\Database\Eloquent\Model;

class Caracteristica_repoblado extends Model
{
	protected $table = 'Satelites_caracteristica_repoblado';
	public $timestamps = false;
	
	protected $fillable = [
		'tipo_repoblado',
		'nombre_comun',
		'numero_colecta',
		'frecuencia',
		'edad',
		'porcentaje_cobertura'
	];
}
