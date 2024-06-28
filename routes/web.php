<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;



Route::resource("empresas", EmpresaController::class);
Route::resource("juegos", JuegoController::class);

Route::post('/agregarJuego',[JuegoController::class,'agregarhistorial'])->name('agregar.index');

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/privada',[UsuarioController::class, 'privada'])->middleware('auth')->name('privada');
Route::get('/login',function (){return view('home.login');})->name('usuario.login');
Route::get('/privada/listaUsuario',[UsuarioController::class,'listaUsuario'])->middleware('auth')->name('listaUsuario.lista');

Route::post('usuarios/editar',[UsuarioController::class,'editarUsuario'])->name('usuarios.editar');
Route::post('usuarios/login',[UsuarioController::class,'login'])->name('usuarios.login');
Route::get('usuarios/logout',[UsuarioController::class,'logout'])->name('usuarios.logout');