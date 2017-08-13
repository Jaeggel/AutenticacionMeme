	
	

	<link href="<?php echo base_url("assets/css/main.css");?>" rel="stylesheet">
	<div class="container">
		<div class="row main">
			<div class="panel-heading">
		       <div class="panel-title text-center">
		       		<h1 class="title">Restablecer Clave de Ingreso</h1>
		       		<hr/>
		       	</div>
		    </div>

			<div class="main-login main-center">
				<form class="form-horizontal" method="post" action="#">
					
				<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Correo Electrónico</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="correo" id="correo"  placeholder="Ingresar Correo Electrónico" required onblur="validarEmail()"/>
								</div>
							</div>
						</div>

					<div class="form-group ">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Enviar</button>
						</div>
						<div class="login-register">
				            <a href="<?php echo site_url('auth/register') ?>">¿No tienes una cuenta?</a>
				         </div>
						
				</form>
			</div>
		</div>
	</div>

<script>
 validarEmail=function() {
	valor = document.getElementById('correo').value;
  if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){

  } else {
   alert("La dirección de email es incorrecta!.");
   document.forms[0].correo.value="";
  }
}
</script>
