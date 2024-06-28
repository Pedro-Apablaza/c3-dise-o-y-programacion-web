<?php

namespace App\Http\Controllers;

use App\Models\HistorialModel;
use Illuminate\Http\Request;
use App\Models\JuegoModel;
use App\Models\EmpresaModel;

class JuegoController extends Controller
{
    public function index(){
        $juegos = JuegoModel::all();
        $empresas = EmpresaModel::all();
        return view('juegos.index',compact('juegos','empresas'));
    }


    public function store(Request $request){
        $juegos = new JuegoModel();
        // campos tabla  =   "names" -> formulario o vista
        $juegos->nombre = $request->nombre;
        $juegos->categoria = $request->categoria;
        $juegos->f_lanzamiento = $request->f_lanzamiento;
        $juegos->precio = $request->precio;
        $juegos->descripcion = $request->descripcion;
        $juegos->id_empresa = $request->id_empresa;
        $juegos->save();
        return redirect()->route('juegos.index');
    }

    public function destroy(JuegoModel $juego)
    {
        $juego->delete();
        return redirect()->route('juegos.index');
    }
}
