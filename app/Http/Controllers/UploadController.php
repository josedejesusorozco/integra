<?php

namespace integra\Http\Controllers;

use Illuminate\Http\Request;
use integra\Http\Request\PostStoreRequest;
use integra\Http\Request\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use integra\Estructura;
use Session;
use DB;

class UploadController extends Controller
{
    public function upload(Request $request){
        
        $file = $request->file('file');
        $destinationPath = public_path('/db');
        $file->move($destinationPath, 'database.sqlite');

        Session::forget('fileName');
        Session::forget('tablas');
        Session::forget('checked');
        //$request->session()->forget('tablas'); //funciona de ambos modos

        Session::put('fileName', $request->file('file')->getClientOriginalName());
        

        //dd(DB::connection('sqlsrv')->table('Satelites.Caracteristica_punto_control')->get());
        
        return back();

        //return redirect()->route(url('/'))->with('info', 'Actualizado');
        //return view('index');
        //return \Redirect::route('/', 'hey')->with('message', 'State saved correctly!!!');
        //return redirect()->route('home');
        //return view('index', compact('tablas'));
        //return redirect()->route('index')->with(compact('tablas'));
        //return redirect()->back()->with('data', $tablas);
        //return view('index')->with('data', $tablas);


    }

    public function upload_(PostStoreRequest $request){
    	
		$post = Post::create($request->all());

		if($request->file('file')){
			$path = Storage::disk('public')->put('db', $request->file('file'));
			$post->fill(['file' => asset($path)])-save();
		}

		return 'Hecho';
    }
}
