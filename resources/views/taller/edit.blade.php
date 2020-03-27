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
					<h3 class="panel-title">Actualizar Datos de Taller</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('taller.update',$talleredit->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<p id="error1"></p>
										<input type="text" name="nombre_t" id="nombre_t" onblur="valiun()" pattern="[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+" class="form-control input-sm" placeholder="Nombre" value="{{$talleredit->nombre_t}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<p id="error4"></p>
										<input type="text" name="telefono" onblur="valit()" id="telefono" class="form-control input-sm" placeholder="Telefono" value="{{$talleredit->telefono}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<p id="error5"></p>
										<input type="text" name="direccion" id="direccion" onblur="validu()" pattern="[a-záéíóúñ#0-9 A-ZÁÉÍÓÚÑ ,]+" class="form-control input-sm" placeholder="Direccion" value="{{$talleredit->direccion}}">
									</div>
								</div>
							</div>
							<div class="form-group">
							<center>
							<div class="form-group">
							<select name="id_a" id="id_a">
						            <option value="{{$talleredit->id_artesano}}">{{$talleredit->nombrea}} {{$talleredit->apa}} {{$talleredit->ama}}</option>
						    	@foreach($artesano as $a)
						                <option value="{{$a->id}}">{{$a->nombre_a}} {{$a->ap_a}} {{$a->am_a}}</option>
						    	@endforeach
						        </select>
							</div>
							</center>
							</div>
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('taller.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
						<script type="text/javascript">
				const $input1 = document.querySelector("#nombre_t");
				const patron1 = /[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+/;
				$input1.addEventListener("keydown", event => {
				  if (patron1.test(event.key)){
				    document.getElementById('nombre_t').style.border = "1px solid #49AF13";
				  }
				  else {
				    if (event.keyCode==8) {
				    }
				    else {
				      event.preventDefault();
				    }
				  }
				});
				function valiun() {
				  var tam = document.getElementById('nombre_t').value;
				  if (tam.length>=3 && tam.length<=30) {
				    document.getElementById('error1').innerHTML = "";
				  }
				  else {
				    document.getElementById('error1').innerHTML = "Error: Tamaño del texto.";
				    document.getElementById('nombre_t').style.border = "1px solid #EF0D0D";
				  }
				}
				</script>

				
					<script type="text/javascript">
				    const $input4 = document.querySelector("#telefono");
				    const patron4 = /[0-9]/;
									
				    $input4.addEventListener("keydown", event => {
				      if (patron4.test(event.key)){
				        document.getElementById('telefono').style.border = "1px solid #49AF13";
				      }
				      else {
				        if (event.keyCode==8) {
				          //console.log("backspace");
				        }
				        else {
				          event.preventDefault();
				          //var tcla = event.keyCode;
				          //console.log(tcla);
				        }
				      }
				    });
				
				    function valit() {
				      var tam = document.getElementById('telefono').value;
				      if (tam.length>=1 && tam.length<=10) {
				        document.getElementById('error4').innerHTML = "";
				      }
				      else {
				        document.getElementById('error4').innerHTML = "Error: Tamaño del texto.";
				        document.getElementById('telefono').style.border = "1px solid #EF0D0D";
				      }
				    }
					</script>
					
					<script type="text/javascript">
					const $input5 = document.querySelector("#direccion");
					const patron5 = /[a-záéíóúñ#0-9 A-ZÁÉÍÓÚÑ ,]+/;
					$input5.addEventListener("keydown", event => {
					  if (patron5.test(event.key)){
					    document.getElementById('direccion').style.border = "1px solid #49AF13";
					  }
					  else {
					    if (event.keyCode==8) {
					    }
					    else {
					      event.preventDefault();
					    }
					  }
					});
				
					function validu() {
					  var tam = document.getElementById('direccion').value;
					  if (tam.length>=3 && tam.length<=80) {
					    document.getElementById('error5').innerHTML = "";
					  }
					  else {
					    document.getElementById('error5').innerHTML = "Error: Tamaño del texto.";
					    document.getElementById('direccion').style.border = "1px solid #EF0D0D";
					  }
					}
					</script>

					<script type="text/javascript">
				    const $input6 = document.querySelector("#id_artesano");
				    const patron6 = /[0-9]+/;
									
				    $input6.addEventListener("keydown", event => {
				      if (patron6.test(event.key)){
				        document.getElementById('id_artesano').style.border = "1px solid #49AF13";
				      }
				      else {
				        if (event.keyCode==8) {
				          //console.log("backspace");
				        }
				        else {
				          event.preventDefault();
				          //var tcla = event.keyCode;
				          //console.log(tcla);
				        }
				      }
				    });
				
				    function valiema() {
				      var tam = document.getElementById('id_artesano').value;
				      if (tam.length>=1 && tam.length<=30) {
				        document.getElementById('error6').innerHTML = "";
				      }
				      else {
				        document.getElementById('error6').innerHTML = "Error: Tamaño del texto.";
				        document.getElementById('id_artesano').style.border = "1px solid #EF0D0D";
				      }
				    }
				    </script>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection