<?php

namespace integra\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class FrontController extends Controller
{
    public function index() {

    	return view('index');
    }

    public function AnalizaSQLite(){

        $SQLite = new SQLiteController();
        $tablas = $SQLite->BuscaErrores();
        
        Session::put('tablas', $tablas);

        return back();
        //return $this->index();
    }

    public function ProcesaSQLite(){

        $SQLite = new SQLiteController();
        $tablas = $SQLite->ArreglaEstructura();

    	return back();
        //return $this->index();
    }

    public function SetCheckbox(Request $request) {

        if($request->ajax()) {

            Session::forget('checked');
            Session::put('checked', $_POST["checked"]);
        }

        //dd(Session::get('tablas'));

        return response()->json(["mensaje" => "Variable actualizada!"]);
    }
}
