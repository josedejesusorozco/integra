<?php

namespace integra;

use Illuminate\Database\Eloquent\Model;

class Caracteristica_arbolado extends Model
{
	protected $table = 'Satelites_caracteristica_arbolado';
	public $timestamps = false;
	
	protected $fillable = [
		'id',
		'id_levantamiento',
		'numero_arbol',
		'id_coordenada',
		'id_especie',
		'id_forma_biologica',
		'id_forma_fuste',
		'id_condicion',
		'diametro_altura_pecho',
		'altura_total',
		'altura_fuste_limpio',
		'altura_comercial',
		'diametro_copa',
		'posicion_copa',
		'proporcion_copa_viva',
		'exposicion_luz',
		'densidad_copa',
		'transparencia_copa',
		'muerte_regresiva',
		'descripcion',
		'numero_tallo',
		'id_vigor',
		'id_vigor_etapa',
		'id_forma_biologica_tocon',
		'id_especie_cat_tax',
		'x',
		'y',
		'id_colecta_botanica',
		'azimut',
		'distancia',
		'angulo_inclinacion',
		'diametro_copa_norte_sur',
		'diametro_copa_este_oeste',
		'nombre_comun',
		'id_forma_geometrica',
		'numero_tallos_pencas',
		'id_forma_crecimiento',
		'altura_total_maxima',
		'altura_total_media',
		'altura_total_minima',
		'diametro_basal',
		'id_grado_putrefaccion_tocon',
		'id_clase_muerto_pie',
		'densidad_follaje_colonia'
	];
}
