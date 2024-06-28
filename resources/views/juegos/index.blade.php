@extends('layouts.master')

@section('contenido-principal')
@if (Auth::check())
@if (Auth::user()->rol_id == '1')
<div class="row">
  <div class="col-lg-3"></div>
  <div class="col-12 mb-3 col-lg-6 float-lg-right">
    <div class="card">
      <div class="card-header bg-dark text-white">Agregar juego</div>
      <div class="card-body">
        <form method="POST" action="{{route('juegos.store')}}">
          @csrf
          <div class="mb-3 form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre"  id="nombre" class="form-control">
          </div>
            <div class="form-group mb-3">
            <label for="precio">Precio</label>
            <input type="text" placeholder="0.00" name="precio" id="precio" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
          </div>
          <div class="form-group mb-3">
            <label for="categoria">Categorías</label>
            <input type="text" placeholder="Fantasia, RPG, Aventura..." name="categoria"  id="categoria" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="f_lanzamiento">Fecha de lanzamiento</label>
            <input type="text" name="f_lanzamiento" placeholder="dd/mm/aaaa" id="f_lanzamiento" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="id_empresa">Desarrolladora:</label>
            <select name="id_empresa" id="id_empresa" class="form-control">
              @foreach ($empresas as $empresa)
                <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>    
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
          </div>
  
          <div class="mb-3 d-grid gap-2 d-lg-block">
            <button type="reset"  class="btn btn-warning">Cancelar</button>
            <button type="submit"  class="btn btn-success">Agregar Juego</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-3"></div>
  @endif
@endif



  <div class="row">
    @foreach($juegos as $juego)
      <div class="col-12 col-lg-3 grid p-2">
        <div class="card text-bg-dark">
          <img src="images/{{$juego->nombre}}.jpg" class="card-img-top" alt="{{$juego->nombre}}">
          <div class="card-body">
            <h5 class="card-title">{{ $juego->nombre }}</h5>
            <ul>
              <li class="list-group-item">{{ $juego->precio }}$</li>
              <li class="list-group-item">{{ $juego->categoria }}</li>
              <li class="list-group-item">{{ $juego->f_lanzamiento }}</li>
              @foreach ($empresas as $empresa)
                @if ($juego->id_empresa == $empresa->id)
                <li class="list-group-item">{{ $empresa->nombre }}</li>
                @endif
              @endforeach
            </ul>
            <p class="card-text">{{ $juego->descripcion }}</p>
            @foreach ($empresas as $empresa)
              @if ($juego->id_empresa == $empresa->id)
              
              <div class="row">
                <div class="col">
                  @if (Auth::check())
                    @if (Auth::user()->rol_id == '2' or Auth::user()->rol_id == '1')
                        <div>
                          <button type="" class="btn btn-sm btn-success ms-5 pb-0" data-bs-toggle="tooltip"
                          data-bs-title="Comprar {{$juego->nombre}}">
                          <span class="material-icons">Comprar</span></button>
                        </div>
                    @endif
                  @endif
                </div>
                
                <div class="col">
                  @if (Auth::check())
                    @if (Auth::user()->rol_id == '1')
                      <form method="POST" action="{{route('juegos.destroy',$juego->id)}}">
                        @csrf
                        @method('delete')
                          <div class="">
                            <button type="submit" class="btn btn-sm btn-danger ms-5 pb-0" data-bs-toggle="tooltip"
                            data-bs-title="Borrar {{$juego->nombre}}">
                            <span class="material-icons">Borrar</span></button>
                          </div>
                      </form>
                    @endif
                  @endif
                </div>
                
              </div>
                
              @endif
            @endforeach
          </div>
        </div>
      </div>
    @endforeach
  </div>
  @endsection
</div>


