<?php

namespace integra\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Collection;
use integra\Caracteristica_punto_control;
use integra\Http\Requests\Caracteristica_punto_control_request;

class Caracteristica_punto_control_controller extends Controller
{
    private $vista = 'caracteristica_punto_control';
    private $tabla = 'Satelites_caracteristica_punto_control';
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

    public function update(Caracteristica_punto_control_request $request, $id) {
        
        $registro = $this->modelo::find($id);

        $registro->paraje =   $request->paraje;

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
