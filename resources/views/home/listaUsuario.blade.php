@extends('layouts.master')

@section('contenido-principal')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="text-center table table-dark table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>E-mail</th>
                        <th>Fecha de creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td class="align-middle">{{$usuario->nombre}}</td>
                            <td class="align-middle">{{$usuario->email}}</td>
                            <td class="align-middle">{{$usuario->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection