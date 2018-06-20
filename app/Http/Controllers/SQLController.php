<?php

namespace integra\Http\Controllers;

use Illuminate\Http\Request;
use integra\SQL;

class SQLController extends Controller
{

	private $objeto;

	public function __construct() {

	}

    public function conglomerados() {
        
        //dd(SQL::conglomerados());
        //$count = 0;
    	foreach(SQL::conglomerados() AS $row) {

            //$count++;
            //Si existe el conglomerado, habrá que borrarlo y toda su información
            if(SQL::existeConglomerado($row->folio)) {

                SQL::borraSatelites($row->id);
                SQL::borraUnidad($row->id);
                SQL::insertaUnidad($row->id);

            } else { //Si no existe el conglomerado, se inserta
                
                SQL::insertaUnidad($row->id);
            }
        }
        
        SQL::insertaSatelites();
        //dd($count);
    }
}
