<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpresaModel;
use App\Models\JuegoModel;

class EmpresaController extends Controller
{
    public function index(){
        $juegos = JuegoModel::all();
        $empresas = EmpresaModel::all();
        return view('empresas.index',compact('juegos','empresas'));
    }

    public function store(Request $request){
        $empresas = new EmpresaModel();
        // campos tabla  =   "names" -> formulario o vista
        $empresas->nombre = $request->nombre;
        $empresas->fundadores = $request->fundadores;
        $empresas->fundacion = $request->fundacion;
        $empresas->descripcion = $request->descripcion;
        $empresas->save();
        return redirect()->route('empresas.index');
    }
}
