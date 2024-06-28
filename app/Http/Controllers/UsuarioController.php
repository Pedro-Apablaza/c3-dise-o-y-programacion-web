<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use App\Models\HistorialModel;
use App\Models\JuegoModel;
use App\Models\EmpresaModel;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function listaUsuario()
    {
        $usuarios = UsuarioModel::all();
        return view('home.privada',compact('usuarios'));
    }

    public function privada()
    {
        /*print hash::make('4444');*/
        $historiales = HistorialModel::all();
        $juegos = JuegoModel::all();
        $empresas = EmpresaModel::all();
        return view('home.privada',compact('historiales', 'juegos', 'empresas'));
    }

    public function editarUsuario(Request $request){
        if ($request->password_actual != ""){
            $user = Auth::user();
            if ($user->email == $request->email) {
                $sqlBD = DB::table('usuarios')
                    ->where('id', $user->id)
                    ->update(['nombre' => $request->name, 'password' => hash::make($request->password_actual)]);
                    
                    return redirect('privada')->with('correcto', 'Se actualizaron los datos');
            }
        }
        return redirect('home.index')->with('incorrecto', 'No se logró actualizar los datos');
    }


    public function login(Request $request){
        $credenciales = $request->only('email','password');
        if (Auth::attempt($credenciales)){
            $usuario = UsuarioModel::where('email',$request->email)->first();
            return redirect()->route('home.index');
        }else{
            return back()->withErrors('Error en las credenciles');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home.index');
    }
}
