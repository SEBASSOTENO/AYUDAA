@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
      <div class="panel panel-hidde">
  <div class="table-responsive">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Talleres</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('taller.create') }}" class="btn btn-primary" >Añadir Taller</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre del taller</th>
               <th>Direccion</th>
               <th>Telefono</th>
               <th>Id artesano</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($taller->count())  
              @foreach($taller as $taller)  
              <tr>
                <td>{{$taller->nombre_t}}</td>
                <td>{{$taller->direccion}}</td>
                <td>{{$taller->telefono}}</td>
                <td>{{$taller->id_artesano}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('TalleresController@edit', $taller->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('TalleresController@destroy', $taller->id)}}" method="post">
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
