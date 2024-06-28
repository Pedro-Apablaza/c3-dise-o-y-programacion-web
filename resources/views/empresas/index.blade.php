@extends('layouts.master')

@section('contenido-principal')
<style>
    .overlay {
      min-height: 100%; 
      background: rgba(0, 0, 0, 0.8);}
  
    .menud {
      float: right;}
    
  </style>

<div class="container-fluid overlay">
    <div class="row">
        <div class="col-8">
            <h3 class="text-white text-center" >Empresas</h3>
        </div>
    </div>

    <div class="row">
        <!-- tabla -->
        <div class="col-12 col-lg-9 order-last order-lg-first">
            <table class="text-center table table-dark table-bordered table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Fundadores</th>
                        <th>Fundación</th>
                        <th>Descripción</th>
                        <th>Juegos</th>
                        <th colspan="3" >Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                    <tr>
                        <td class="align-middle">{{$empresa->id}}</td>
                        <td class="align-middle">{{$empresa->nombre}}</td>
                        <td class="align-middle">{{$empresa->fundadores}}</td>
                        <td class="align-middle">{{$empresa->fundacion}}</td>
                        <td class="align-middle">{{$empresa->descripcion}}</td>
                        <td class="align-middle">
                            <select class="form-select" aria-label="Default select example">
                            @foreach ($juegos as $juego)
                                @if ($juego->id_empresa == $empresa->id)
                                    <option value="{{$juego->id}}">{{$juego->nombre}}</option>
                                @endif
                            @endforeach
                          </select>
                        </td>
                        <td class="text-center" style="width: 1rem">
                            <!--BORRAR -->
                            <form method="POST" action="{{route('empresas.destroy',$empresa->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger pb-0" data-bs-toggle="tooltip"
                                data-bs-title="Borrar {{$empresa->nombre}}">
                                <span class="material-icons">Borrar</span></button>
                            </form>
                            {{-- <a href="#" class="btn btn-sm btn-danger pb-0" data-bs-toggle="tooltip"
                                data-bs-title="Borrar {{$equipo->nombre}}">
                                <span class="material-icons">delete</span>
                            </a> --}}
                            <!--/BORRAR -->
                        </td>
                        <td class="text-center" style="width: 1rem">
                            <a href="#" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip"
                                data-bs-title="Editar {{$empresa->nombre}}">
                                <span class="material-icons">Editar</span>
                            </a>
                        </td>
                        <td class="text-center" style="width: 1rem">
                            <a href="#" class="btn btn-sm btn-info pb-0 text-white" data-bs-toggle="tooltip"
                                data-bs-title="Ver {{$empresa->nombre}}">
                                <span class="material-icons">Ver</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if (Auth::check())
        @if (Auth::user()->rol_id == '1')
        <!-- form agregar equipo -->
        <div class="col-12 col-lg-3 menud">
            <div class="card">
                <div class="card-header bg-dark text-white">Agregar empresa</div>
                <div class="card-body">
                    <form method="POST" action="{{route('empresas.store')}}">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre"  id="nombre" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                          <label for="fundadores">fundadores</label>
                          <input type="text" name="fundadores" id="fundadores" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="fundacion">Fundación</label>
                            <input type="text" placeholder="dd/mm/aaaa" name="fundacion"  id="fundacion" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                          <label for="descripcion">Descripción</label>
                          <textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
                        </div>
          
                        <div class="mb-3 d-grid gap-2 d-lg-block">
                            <button type="reset"  class="btn btn-warning">Cancelar</button>
                            <button type="submit"  class="btn btn-success">Agregar Empresa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endif
    </div>

@endsection

</div>