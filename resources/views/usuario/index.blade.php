@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
      <div class="panel panel-hidde">
  <div class="table-responsive">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Usuarios</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('usuario.create') }}" class="btn btn-primary" >Añadir Usuario</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Apellido paterno</th>
               <th>Apellido Materno</th>
               <th>Telefono</th>
               <th>Direccion</th>
               <th>Email</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($usuario->count())  
              @foreach($usuario as $usuario)  
              <tr>
                <td>{{$usuario->nombre_u}}</td>
                <td>{{$usuario->ap_u}}</td>
                <td>{{$usuario->am_u}}</td>
                <td>{{$usuario->telefono}}</td>
                <td>{{$usuario->direccion}}</td>
                <td>{{$usuario->email}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('UsuariosController@edit', $usuario->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('UsuariosController@destroy', $usuario->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
      
    </div>
  </div>
  </div>
</section>
 
@endsection