@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
      <div class="panel panel-hidde">
      <div class="table-responsive">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Artesanos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('artesano.create') }}" class="btn btn-primary" >Añadir Artesano</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre</th>
               <th>Apellido paterno</th>
               <th>Apellido Materno</th>
               <th>Edad</th>
               <th>Telefono</th>
               <th>Email</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($artesanos->count())  
              @foreach($artesanos as $artesano)  
              <tr>
                <td>{{$artesano->id}}</td>
                <td>{{$artesano->nombre_a}}</td>
                <td>{{$artesano->ap_a}}</td>
                <td>{{$artesano->am_a}}</td>
                <td>{{$artesano->edad}}</td>
                <td>{{$artesano->telefono}}</td>
                <td>{{$artesano->email}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ArtesanoController@edit', $artesano->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{route('artesano.destroy', $artesano->id)}}" method="post">
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