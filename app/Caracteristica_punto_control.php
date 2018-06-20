<?php

namespace integra;

use Illuminate\Database\Eloquent\Model;

class Caracteristica_punto_control extends Model
{
	protected $table = 'Satelites_caracteristica_punto_control';
	public $timestamps = false;
	
	protected $fillable = [
		'id',
		'id_levantamiento',
		'id_coordenada',
		'id_condicion_acceso',
		'paraje'
	];
}
