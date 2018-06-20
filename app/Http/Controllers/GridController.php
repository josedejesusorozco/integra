<?php

namespace integra\Http\Controllers;

use Illuminate\Http\Request;
use integra\Caracteristica_arbolado;

class GridController extends Controller
{
	private $modelo = "";

    public function index($modelo) {

    	$this->modelo = 'integra\Caracteristica_arbolado';
    	
    	$test = $this->modelo::orderBy('id', 'DESC')->paginate();
    	//$test = Caracteristica_arbolado::orderBy('id', 'DESC')->paginate();
    	return view('grid.index', compact('test'));
    }

    public function edit($id) {

    	$this->modelo = 'integra\Caracteristica_arbolado';

    	$registro = $this->modelo::find($id);
    	return view('grid.edit', compact('registro'));
    }

    public function update(Request $request, $id) {
    	
    	$registro = Caracteristica_arbolado::find($id);

    	$registro->id_levantamiento = 	$request->id_levantamiento;
    	$registro->numero_arbol = 		$request->numero_arbol;
    	$registro->id_coordenada = 		$request->id_coordenada;
    	$registro->id_especie = 		$request->id_especie;
    	$registro->id_forma_biologica = $request->id_forma_biologica;
    	$registro->id_forma_fuste = 	$request->id_forma_fuste;
    	$registro->id_condicion = 		$request->id_condicion;

    	//dd($registro);

    	$registro->save();

    	return redirect()->route("grid/{'caracteristica_arbolado'}")
    					 ->width('info', 'Actualizado');
    }
}
