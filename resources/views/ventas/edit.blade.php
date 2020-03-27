@extends('layouts.layout')
@section('content')
<center>
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Actualizar Datos de Ventas</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('venta.update',$ventas->id) }}"  role="form">
							{{ csrf_field() }}
							{{ method_field('PUT')}}
							<tr>
						      <td>Usuario: </td>
						      <td>
						        <select name="id_u" id="id_u">
						        	<option value="{{$ventas->id_usuario}}">{{$ventas->nombreu}}</option>
								@foreach($usuario as $u)
						            <option value="{{$u->id}}">{{$u->nombre_u}}{{$u->ap_u}} {{$u->am_u}}</option>
						    	@endforeach

						        </select>
						      </td>
						        <br><br>

						      <td>Artesano: </td>
						      <td>
						        <select name="id_a" id="id_a">
						        	<option value="{{$ventas->id_artesano}}">{{$ventas->nombrea}}</option>
									@foreach($artesano as $a)
						                <option value="{{$a->id}}">{{$a->nombre_a}}{{$a->ap_a}}{{$a->am_a}}</option>
						    		@endforeach
						        </select>
						      </td>

						      <br><br>

						      <td>Productos: </td>
						      <td>
						        <select name="id_p" id="id_p">
						            <option value="{{$ventas->id_producto}}">{{$ventas->nombrep}}</option>
									@foreach($producto as $ve)
						                <option value="{{$ve->id}}">{{$ve->nombre_p}}</option>
						    		@endforeach
						        </select>
						      </td>
						    </tr>

							<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('venta.index') }}" class="btn btn-info btn-block" >Atrás</a>
							</div>	

						</form>
                        
					</div>
				</div>
 
			</div>
		</div>
</center>
	</section>
	@endsection