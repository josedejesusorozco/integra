<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicaArboladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Satelites_caracteristica_arbolado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_levantamiento');
            $table->integer('numero_arbol');
            $table->integer('id_coordenada');
            $table->integer('id_especie');
            $table->integer('id_forma_biologica');
            $table->integer('id_forma_fuste');
            $table->integer('id_condicion');
            $table->float('diametro_altura_pecho');
            $table->float('altura_total');
            $table->float('altura_fuste_limpio');
            $table->float('altura_comercial');
            $table->float('diametro_copa');
            $table->string('posicion_copa');
            $table->float('proporcion_copa_viva');
            $table->string('exposicion_luz');
            $table->float('densidad_copa');
            $table->float('transparencia_copa');
            $table->float('muerte_regresiva');
            $table->text('descripcion');
            $table->integer('numero_tallo');
            $table->integer('id_vigor');
            $table->integer('id_vigor_etapa');
            $table->integer('id_forma_biologica_tocon');
            $table->integer('id_especie_cat_tax');
            $table->integer('x');
            $table->integer('y');
            $table->integer('id_colecta_botanica');
            $table->float('azimut');
            $table->float('distancia');
            $table->integer('angulo_inclinacion');
            $table->integer('diametro_copa_norte_sur');
            $table->integer('diametro_copa_este_oeste');
            $table->integer('nombre_comun');
            $table->integer('id_forma_geometrica');
            $table->integer('numero_tallos_pencas');
            $table->integer('id_forma_crecimiento');
            $table->integer('altura_total_maxima');
            $table->integer('altura_total_media');
            $table->integer('altura_total_minima');
            $table->integer('diametro_basal');
            $table->integer('id_grado_putrefaccion_tocon');
            $table->integer('id_clase_muerto_pie');
            $table->integer('densidad_follaje_colonia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Satelites_caracteristica_arbolado');
    }
}
