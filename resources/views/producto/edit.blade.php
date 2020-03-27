@extends('layouts.layout')
@section('content')
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
					<h3 class="panel-title">Actualizar Productos</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('producto.update',$producto->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<p id="error1"></p>
										<input type="text" name="nombre_p" id="nombre_p" onblur="valipro()" pattern="[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+" class="form-control input-sm" placeholder="Nombre" value="{{$producto->nombre_p}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<p id="error2"></p>
										<input type="text" name="costo" id="costo" onblur="valico()" pattern="[0-9.$]+" class="form-control input-sm" placeholder="Costo" value="{{$producto->costo}}">
									</div>
								</div>
							</div>
 
							<div class="form-group">
								<p id="error3"></p>
                            <input type="text" name="descripcion" id="descripcion" onblur="valide()" pattern="[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+" class="form-control input-sm" placeholder="Descripcion" value="{{$producto->descripcion}}">
							</div>
							<center>
							<div class="custom-file">
                            <input type="file" name="imagen" id="imagen" class="custom-file-input" value="{{$producto->imagen}}">
							</div>
							</center>
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('producto.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>

						<script type="text/javascript">
						const $input1 = document.querySelector("#nombre_p");
						const patron1 = /[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+/;
						$input1.addEventListener("keydown", event => {
						  if (patron1.test(event.key)){
						    document.getElementById('nombre_p').style.border = "1px solid #49AF13";
						  }
						  else {
						    if (event.keyCode==8) {
						    }
						    else {
						      event.preventDefault();
						    }
						  }
						});
						function valipro() {
						  var tam = document.getElementById('nombre_p').value;
						  if (tam.length>=3 && tam.length<=50) {
						    document.getElementById('error1').innerHTML = "";
						  }
						  else {
						    document.getElementById('error1').innerHTML = "Error: Tamaño del texto.";
						    document.getElementById('nombre_p').style.border = "1px solid #EF0D0D";
						  }
						}
						</script>

						<script type="text/javascript">
						const $input2 = document.querySelector("#costo");
						const patron2 = /[0-9.$]+/;
						$input2.addEventListener("keydown", event => {
						  if (patron2.test(event.key)){
						    document.getElementById('costo').style.border = "1px solid #49AF13";
						  }
						  else {
						    if (event.keyCode==8) {
						    }
						    else {
						      event.preventDefault();
						    }
						  }
						});
						function valico() {
						  var tam = document.getElementById('costo').value;
						  if (tam.length>=3 && tam.length<=10) {
						    document.getElementById('error2').innerHTML = "";
						  }
						  else {
						    document.getElementById('error2').innerHTML = "Error: Tamaño del texto.";
						    document.getElementById('costo').style.border = "1px solid #EF0D0D";
						  }
						}
						</script>

						<script type="text/javascript">
						const $input3 = document.querySelector("#descripcion");
						const patron3 = /[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+/;
						$input3.addEventListener("keydown", event => {
						  if (patron3.test(event.key)){
						    document.getElementById('descripcion').style.border = "1px solid #49AF13";
						  }
						  else {
						    if (event.keyCode==8) {
						    }
						    else {
						      event.preventDefault();
						    }
						  }
						});
						function valide() {
						  var tam = document.getElementById('descripcion').value;
						  if (tam.length>=3 && tam.length<=500) {
						    document.getElementById('error3').innerHTML = "";
						  }
						  else {
						    document.getElementById('error3').innerHTML = "Error: Tamaño del texto.";
						    document.getElementById('descripcion').style.border = "1px solid #EF0D0D";
						  }
						}
						</script>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection