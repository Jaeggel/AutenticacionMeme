	<?php echo form_open('auth/index'); ?>

	<link href="<?php echo base_url("assets/css/main.css");?>" rel="stylesheet">
	<div class="container">
		<div class="row main">
			<div class="panel-heading">
		       <div class="panel-title text-center">
		       		<h1 class="title">Ingreso al Sistema</h1>
		       		<hr/>
		       	</div>
		    </div>

			<div class="main-login main-center">
				<form class="form-horizontal" method="post" action="#">
					<div class="form-group">
						<label for="username" class="cols-sm-2 control-label">Usuario</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="user" id="user"  placeholder="Ingresar Nombre de Usuario" required/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Contraseña</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="clave" id="clave"  placeholder="Ingresar Contraseña" required/>
							</div>
						</div>
					</div>

					<div class="form-group ">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Ingresar</button>
						</div>
						
						<div class="login-register">
				            ¿Olvidó su contrasena? <a href="<?php echo site_url('auth/restablecer') ?>">Restablecer clave.</a>
				         </div>
				</form>
			</div>
		</div>
	</div>
