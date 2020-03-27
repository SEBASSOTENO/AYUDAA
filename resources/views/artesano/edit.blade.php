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
					<h3 class="panel-title">Actualizar Datos</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('artesano.update',$artesano->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<p id="error1"></p>
										<input type="text" name="nombre_a" id="nombre_a" onblur="valinom()" pattern="[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+" class="form-control input-sm" placeholder="Nombre del artesano" value="{{$artesano->nombre_a}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<p id="error2"></p>
										<input type="text" name="ap_a" id="ap_a" onblur="valiapp()" pattern="[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+" class="form-control input-sm" placeholder="Apellido Paterno del artesano" value="{{$artesano->ap_a}}">
									</div>
								</div>
							</div>
 
							<div class="form-group">
							<p id="error3"></p>
                            <input type="text" name="am_a" id="am_a" onblur="valiapm()" pattern="[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+" class="form-control input-sm" placeholder="Apellido Materno del artesano" value="{{$artesano->am_a}}">
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<p id="error4"></p>
										<input type="text" name="edad" id="edad" onblur="valied()" pattern="[0-9]+" class="form-control input-sm"  placeholder="Edad del artesano" value="{{$artesano->edad}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<p id="error5"></p>
										<input type="text" name="telefono" id="telefono" onblur="valitel()" pattern="[0-9]+" class="form-control input-sm" placeholder="Telefono del artesano" value="{{$artesano->telefono}}">
									</div>
								</div>
							</div>
							<div class="form-group">
							<p id="error6"></p>
                            <input type="text" name="email" id="email" class="form-control input-sm" onblur="valiema()" pattern="[a-zA-Z0-9\/.*@ñÑ]+" placeholder="Email del artesano" value="{{$artesano->email}}">
							</div>
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('artesano.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>


						<script type="text/javascript">
   	 					const $input1 = document.querySelector("#nombre_a");
    					const patron1 = /[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+/;

    					$input1.addEventListener("keydown", event => {
    					  if (patron1.test(event.key)){
    					    document.getElementById('nombre_a').style.border = "1px solid #49AF13";
    					  }
    					  else {
    					    if (event.keyCode==8) {
    					    }
    					    else {
    					      event.preventDefault();
    					    }
    					  }
    					});
    					function valinom() {
    					  var tam = document.getElementById('nombre_a').value;
    					  if (tam.length>=3 && tam.length<=30) {
    					    document.getElementById('error1').innerHTML = "";
    					  }
    					  else {
    					    document.getElementById('error1').innerHTML = "Error: Tamaño del texto.";
    					    document.getElementById('nombre_a').style.border = "1px solid #EF0D0D";
    					  }
    					}
    					</script>


						<script type="text/javascript">
   	 					const $input2 = document.querySelector("#ap_a");
    					const patron2 = /[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+/;

    					$input2.addEventListener("keydown", event => {
    					  if (patron2.test(event.key)){
    					    document.getElementById('ap_a').style.border = "1px solid #49AF13";
    					  }
    					  else {
    					    if (event.keyCode==8) {
    					    }
    					    else {
    					      event.preventDefault();
    					    }
    					  }
    					});
					
    					function valiapp() {
    					  var tam = document.getElementById('ap_a').value;
    					  if (tam.length>=3 && tam.length<=30) {
    					    document.getElementById('error2').innerHTML = "";
    					  }
    					  else {
    					    document.getElementById('error2').innerHTML = "Error: Tamaño del texto.";
    					    document.getElementById('ap_a').style.border = "1px solid #EF0D0D";
    					  }
    					}
    					</script>


						<script type="text/javascript">
   	 					const $input3 = document.querySelector("#am_a");
    					const patron3 = /[a-záéíóúñ A-ZÁÉÍÓÚÑ ]+/;

    					$input3.addEventListener("keydown", event => {
    					  if (patron3.test(event.key)){
    					    document.getElementById('am_a').style.border = "1px solid #49AF13";
    					  }
    					  else {
    					    if (event.keyCode==8) {
    					    }
    					    else {
    					      event.preventDefault();
    					    }
    					  }
    					});
					
    					function valiapm() {
    					  var tam = document.getElementById('am_a').value;
    					  if (tam.length>=3 && tam.length<=30) {
    					    document.getElementById('error3').innerHTML = "";
    					  }
    					  else {
    					    document.getElementById('error3').innerHTML = "Error: Tamaño del texto.";
    					    document.getElementById('am_a').style.border = "1px solid #EF0D0D";
    					  }
    					}
    					</script>


						<script type="text/javascript">
						    const $input4 = document.querySelector("#edad");
						    const patron4 = /[0-9]/;
											
						    $input4.addEventListener("keydown", event => {
						      if (patron4.test(event.key)){
						        document.getElementById('edad').style.border = "1px solid #49AF13";
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
						
						    function valied() {
						      var tam = document.getElementById('edad').value;
						      if (tam.length>=1 && tam.length<=2) {
						        document.getElementById('error4').innerHTML = "";
						      }
						      else {
						        document.getElementById('error4').innerHTML = "Error: Tamaño del texto.";
						        document.getElementById('edad').style.border = "1px solid #EF0D0D";
						      }
						    }
						    </script>


							<script type="text/javascript">
						    const $input5 = document.querySelector("#telefono");
						    const patron5 = /[0-9]/;
											
						    $input5.addEventListener("keydown", event => {
						      if (patron5.test(event.key)){
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
						
						    function valitel() {
						      var tam = document.getElementById('telefono').value;
						      if (tam.length>=1 && tam.length<=10) {
						        document.getElementById('error5').innerHTML = "";
						      }
						      else {
						        document.getElementById('error5').innerHTML = "Error: Tamaño del texto.";
						        document.getElementById('telefono').style.border = "1px solid #EF0D0D";
						      }
						    }
						    </script>


							<script type="text/javascript">
						    const $input6 = document.querySelector("#email");
						    const patron6 = /[a-zA-Z0-9\/.*@ñÑ]+/;
											
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