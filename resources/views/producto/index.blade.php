@extends('layouts.layout')
@section('content')



<div class="row">
  <section class="content">
  <div class="panel panel-hidde">
  <div class="table-responsive"></div>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Productos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('producto.create') }}" class="btn btn-primary" >Añadir Producto</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre</th>
               <th>Costo</th>
               <th>Descripcion</th>
               <th>Imagen</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($productos->count())  
              @foreach($productos as $producto)  
              <tr>
              <td>{{$producto->id}}</td>
                <td>{{$producto->nombre_p}}</td>
                <td>{{$producto->costo}}</td>
                <td>{{$producto->descripcion}}</td>
                <td><a href="{{$producto->imagen}}"> Ver imagen </a></td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ProductosController@edit', $producto->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{route('producto.destroy', $producto->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">Aun no hay productos</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      
      
    </div>
  </div>
  </div>
</section>
 
@endsection