@extends('layouts.master')

@section('contenido-principal')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 col-lg-2">
                <img src="{{asset('images/usuario.png')}}" style="width: 100px" alt="">
            </div>
            <div class="col-12 col-lg-10 text-white">
                <h1>Bienvenido {{Auth::user()->nombre}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-2"></div>
            <div class="col-12 col-lg-4">
                <div class="mb-3 text-white">
                    <label for="name" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->nombre}}" required>
                </div>
                <div class="mb-3 text-white">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" id="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-3 text-white">
                    <label for="password_actual" class="form-label">Contraseña Actual</label>
                    <input type="password" value="{{Auth::user()->password}}" class="form-control" name="password_actual" id="password_actual" required>
                </div>
                <div class="mb-3 d-grid gap-2 d-lg-block">
                    <button type="reset"  class="btn btn-warning">Cancelar</button>
                    <button type="submit"  class="btn btn-success">Hacer cambios</button>
                </div>
            </form>
        </div>

        <!-- Historial -->
        <div class="col-4 text-center text-white">
                <h3>Historial de compras</h3>
                <table class="text-center table table-dark table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Empresa</th>
                            <th>Fecha de la Compra</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historiales as $historial)
                            @if ($historial->id_usuario == Auth::user()->id)
                                @foreach ($juegos as $juego)
                                    @if ($historial->id_juego == $juego->id)
                                        @foreach ($empresas as $empresa)
                                            @if ($juego->id_empresa == $empresa->id)
                                                <tr>
                                                    <td class="align-middle">{{$juego->nombre}}</td>
                                                    <td class="align-middle">{{$juego->precio}}</td>
                                                    <td class="align-middle">{{$empresa->nombre}}</td>
                                                    <td class="align-middle">{{$historial->created_at}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection