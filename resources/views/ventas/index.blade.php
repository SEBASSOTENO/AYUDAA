@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
      <div class="panel panel-hidde">
  <div class="table-responsive">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Ventas</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('venta.create') }}" class="btn btn-primary" >Añadir Venta</a>
              <a href="/pdf" class="btn btn-success" >Detalles</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Usuario</th>
               <th>Artesano</th>
               <th>Producto</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($ventas->count())  
              @foreach($ventas as $v)  
              <tr>
                <td>{{$v->nombreu}} {{$v->apu}} {{$v->amu}}</td>
                <td>{{$v->nombrea}} {{$v->apa}} {{$v->ama}}</td>
                <td>{{$v->nombrep}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('VentasController@edit', $v->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('VentasController@destroy', $v->id)}}" method="post" name="id">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  </form>
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