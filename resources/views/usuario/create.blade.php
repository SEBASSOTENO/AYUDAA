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
					<h3 class="panel-title">Nuevo Usuario</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('usuario.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<p id="error1"></p>
										<input type="text" name="nombre_u" id="nombre_u" onblur="valiun()" pattern="[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+" class="form-control input-sm" placeholder="Nombre">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<p id="error2"></p>
										<input type="text" name="ap_u" id="ap_u" onblur="valiup()" pattern="[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+" class="form-control input-sm" placeholder="Apellido Paterno">
									</div>
								</div>
							</div>
 
							<div class="form-group">
							<p id="error3"></p>
                            <input type="text" name="am_u" id="am_u" onblur="valium()" pattern="[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+" class="form-control input-sm" placeholder="Apellido Materno">
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<p id="error4"></p>
										<input type="text" name="telefono" onblur="valit()" id="telefono" class="form-control input-sm" placeholder="Telefono">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<p id="error5"></p>
										<input type="text" name="direccion" id="direccion" onblur="validu()" pattern="[a-záéíóúñ#0-9 A-ZÁÉÍÓÚÑ ,]+" class="form-control input-sm" placeholder="Direccion">
									</div>
								</div>
							</div>
							<div class="form-group">
							<p id="error6"></p>
                            <input type="text" name="email" id="email" class="form-control input-sm" onblur="valiema()" pattern="[a-zA-Z0-9\/-_-.*@ñÑ]+" placeholder="Email">
							</div>
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('usuario.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
						<script type="text/javascript">
				const $input1 = document.querySelector("#nombre_u");
				const patron1 = /[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+/;
				$input1.addEventListener("keydown", event => {
				  if (patron1.test(event.key)){
				    document.getElementById('nombre_u').style.border = "1px solid #49AF13";
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
				  var tam = document.getElementById('nombre_u').value;
				  if (tam.length>=3 && tam.length<=30) {
				    document.getElementById('error1').innerHTML = "";
				  }
				  else {
				    document.getElementById('error1').innerHTML = "Error: Tamaño del texto.";
				    document.getElementById('nombre_u').style.border = "1px solid #EF0D0D";
				  }
				}
				</script>

				
				<script type="text/javascript">
				const $input2 = document.querySelector("#ap_u");
				const patron2 = /[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+/;
				$input2.addEventListener("keydown", event => {
				  if (patron2.test(event.key)){
				    document.getElementById('ap_u').style.border = "1px solid #49AF13";
				  }
				  else {
				    if (event.keyCode==8) {
				    }
				    else {
				      event.preventDefault();
				    }
				  }
				});
			
				function valiup() {
				  var tam = document.getElementById('ap_u').value;
				  if (tam.length>=3 && tam.length<=30) {
				    document.getElementById('error2').innerHTML = "";
				  }
				  else {
				    document.getElementById('error2').innerHTML = "Error: Tamaño del texto.";
				    document.getElementById('ap_u').style.border = "1px solid #EF0D0D";
				  }
				}
				</script>
				<script type="text/javascript">
				const $input3 = document.querySelector("#am_u");
				const patron3 = /[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+/;
				$input3.addEventListener("keydown", event => {
				  if (patron3.test(event.key)){
				    document.getElementById('am_u').style.border = "1px solid #49AF13";
				  }
				  else {
				    if (event.keyCode==8) {
				    }
				    else {
				      event.preventDefault();
				    }
				  }
				});
			
				function valium() {
				  var tam = document.getElementById('am_u').value;
				  if (tam.length>=3 && tam.length<=30) {
				    document.getElementById('error3').innerHTML = "";
				  }
				  else {
				    document.getElementById('error3').innerHTML = "Error: Tamaño del texto.";
				    document.getElementById('am_u').style.border = "1px solid #EF0D0D";
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
				    const $input6 = document.querySelector("#email");
				    const patron6 = /[a-zA-Z0-9\/-_-.*@ñÑ]+/;
									
				    $input6.addEventListener("keydown", event => {
				      if (patron6.test(event.key)){
				        document.getElementById('email').style.border = "1px solid #49AF13";
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
				      var tam = document.getElementById('email').value;
				      if (tam.length>=1 && tam.length<=30) {
				        document.getElementById('error6').innerHTML = "";
				      }
				      else {
				        document.getElementById('error6').innerHTML = "Error: Tamaño del texto.";
				        document.getElementById('email').style.border = "1px solid #EF0D0D";
				      }
				    }
				    </script>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection