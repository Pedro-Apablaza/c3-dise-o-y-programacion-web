<?php

namespace App\Http\Controllers;
use App\Models\EmpresaModel;
use App\Models\JuegoModel;

abstract class Controller
{
    public function index(){
        $empresas = EmpresaModel::all();
        $juegos = JuegoModel::all();
        return view('juegos.index', compact('empresas', 'juegos'));
    }
}
