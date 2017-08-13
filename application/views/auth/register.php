<?php echo validation_errors(); ?>

<?php echo form_open('auth/register'); ?>
<link href="<?php echo base_url("assets/css/main.css");?>" rel="stylesheet">
<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Nuevo Usuario</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post">

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Cédula</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i></span>
									<input type="text" class="form-control solo-numero" name="cedula" id="cedula"  placeholder="Ingresar Cédula Válida" required maxlength="10" onblur="validarDocumento()" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Nombre</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Ingresar Nombre" required onkeypress="return soloLetras(event)"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Apellido</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="apellido" id="apellido"  placeholder="Ingresar Apellido" required onkeypress="return soloLetras(event)"/>
								</div>
							</div>
						</div>

            <div class="form-group">
              <div id="mensaje1"></div>

            </div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Correo Electrónico</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="correo" id="correo"  placeholder="Ingresar Correo Electrónico" required onblur="validarEmail()"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Fecha de Nacimiento</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar-o fa" aria-hidden="true"></i></span>
									<input type="date" class="form-control" name="fecha" id="fecha" style="font-size: 11px" onblur="validarFecha()"/>
								</div>
							</div>
						</div>

            <div class="form-group">
              <div id="mensaje"></div>

            </div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Nombre de Usuario</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user-circle fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="nick" id="nick"  placeholder="Ingresar Nombre de Usuario" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Contraseña</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="contraseña" id="contraseña"  placeholder="Ingresar Contraseña" required onblur="validarTamaño1()"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Autentificación</button>
						</div>
						<div class="login-register">
				            <a href="<?php echo site_url('/') ?>">Login</a>
				         </div>
					</form>
				</div>
			</div>
		</div><br>

<script>
        $(document).ready(function (){
          $('.solo-numero').keyup(function (){

            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
        });
 </script>


<script type="text/javascript">

   validarDocumento  = function() {

      numero = document.getElementById('cedula').value;
    /* alert(numero); */
      var suma = 0;
      var residuo = 0;
      var pri = false;
      var pub = false;
      var nat = false;
      var numeroProvincias = 22;
      var modulo = 11;

      /* Verifico que el campo no contenga letras */
      var ok=1;
      for (i=0; i<numero.length && ok==1 ; i++){
         var n = parseInt(numero.charAt(i));
         if (isNaN(n)) ok=0;
      }
      if (ok==0){
         alert("No puede ingresar caracteres en el número");
         document.forms[0].cedula.value="";
         return false;
      }

      if (numero.length < 10 && numero.length >0 ){
         alert('El número ingresado no es válido');
         document.forms[0].cedula.value="";
         return false;
      }

      /* Los primeros dos digitos corresponden al codigo de la provincia */
      provincia = numero.substr(0,2);
      if (provincia < 1 || provincia > numeroProvincias){
         //alert('El código de la provincia (dos primeros dígitos) es inválido');
         document.forms[0].cedula.value="";
     return false;
      }
      /* Aqui almacenamos los digitos de la cedula en variables. */
      d1  = numero.substr(0,1);
      d2  = numero.substr(1,1);
      d3  = numero.substr(2,1);
      d4  = numero.substr(3,1);
      d5  = numero.substr(4,1);
      d6  = numero.substr(5,1);
      d7  = numero.substr(6,1);
      d8  = numero.substr(7,1);
      d9  = numero.substr(8,1);
      d10 = numero.substr(9,1);

      /* El tercer digito es: */
      /* 9 para sociedades privadas y extranjeros   */
      /* 6 para sociedades publicas */
      /* menor que 6 (0,1,2,3,4,5) para personas naturales */
      if (d3==7 || d3==8){
         alert('El tercer dígito ingresado es inválido');
         document.forms[0].cedula.value="";
         return false;
      }

      /* Solo para personas naturales (modulo 10) */
      if (d3 < 6){
         nat = true;
         p1 = d1 * 2;  if (p1 >= 10) p1 -= 9;
         p2 = d2 * 1;  if (p2 >= 10) p2 -= 9;
         p3 = d3 * 2;  if (p3 >= 10) p3 -= 9;
         p4 = d4 * 1;  if (p4 >= 10) p4 -= 9;
         p5 = d5 * 2;  if (p5 >= 10) p5 -= 9;
         p6 = d6 * 1;  if (p6 >= 10) p6 -= 9;
         p7 = d7 * 2;  if (p7 >= 10) p7 -= 9;
         p8 = d8 * 1;  if (p8 >= 10) p8 -= 9;
         p9 = d9 * 2;  if (p9 >= 10) p9 -= 9;
         modulo = 10;
      }
      /* Solo para sociedades publicas (modulo 11) */
      /* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
      else if(d3 == 6){
         pub = true;
         p1 = d1 * 3;
         p2 = d2 * 2;
         p3 = d3 * 7;
         p4 = d4 * 6;
         p5 = d5 * 5;
         p6 = d6 * 4;
         p7 = d7 * 3;
         p8 = d8 * 2;
         p9 = 0;
      }

      /* Solo para entidades privadas (modulo 11) */
      else if(d3 == 9) {
         pri = true;
         p1 = d1 * 4;
         p2 = d2 * 3;
         p3 = d3 * 2;
         p4 = d4 * 7;
         p5 = d5 * 6;
         p6 = d6 * 5;
         p7 = d7 * 4;
         p8 = d8 * 3;
         p9 = d9 * 2;
      }

      suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
      residuo = suma % modulo;
      /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
      digitoVerificador = residuo==0 ? 0: modulo - residuo;
      /* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/
      if (pub==true){
         if (digitoVerificador != d9){
            alert('La cédula del usuario es incorrecta.');
            document.forms[0].cedula.value="";
            return false;
         }
         /* El ruc de las empresas del sector publico terminan con 0001*/
         if ( numero.substr(9,4) != '0001' ){
            alert('El ruc de la empresa del sector público debe terminar con 0001');
            document.forms[0].cedula.value="";
            return false;
         }
      }
      else if(pri == true){
         if (digitoVerificador != d10){
            alert('La cédula del usuario es es incorrecta.');
            document.forms[0].cedula.value="";
            return false;
         }
         if ( numero.substr(10,3) != '001' ){
            alert('El ruc de la empresa del sector privado debe terminar con 001');
            document.forms[0].cedula.value="";
            return false;
         }
      }
      else if(nat == true){
         if (digitoVerificador != d10){
            alert('El número de cédula es incorrecto.');
            document.forms[0].cedula.value="";
            return false;
         }
         if (numero.length >10 && numero.substr(10,3) != '001' ){
            alert('El ruc de la persona natural debe terminar con 001');
            document.forms[0].cedula.value="";
            return false;
         }
      }
      return true;
   }
</script>

<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>

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

<script>
  validarFechaMenorActual=function(){
  	date = document.getElementById('fecha').value;
      var x=new Date();
      var fec = date.split("/");
      x.setFullYear(fec[2],fec[1]-1,fec[0]);
      var today = new Date();



}
</script>

<script>
    validarTamaño1  = function() {
        num = document.getElementById('contraseña').value;

        if(num.length<6 && num.length>0){
            alert('la contraseña debe ser mayor a 5 caracteres.');
            document.forms[0].contraseña.value="";
            return false;
        }else{
            return true;
        }
        return true;
    }
</script>

<script>
    validarFecha  = function() {
        fecha = document.getElementById('fecha').value;
        console.log(fecha);
        valuesStart=fecha.split("-");

        //FECHA MINIMA
        fechaFinal=("1940-01-01");
            valuesEnd=fechaFinal.split("-");

        //OBTENER FECHA ACTUAL
        var f = new Date();
        fechaPasada=(f.getFullYear()+"-"+(f.getMonth()+1)+"-"+f.getDate());
            valuesPasada=fechaPasada.split("-");
            console.log(fechaPasada);
            // Verificamos que la fecha no sea posterior a la actual
            var dateStart=new Date(valuesStart[0],(valuesStart[1]-1),valuesStart[2]);
            var dateEnd=new Date(valuesEnd[0],(valuesEnd[1]-1),valuesEnd[2]);

            var datePasada=new Date(valuesPasada[0],(valuesPasada[1]-1),valuesPasada[2]);

        if(dateStart<=dateEnd){
            alert('la fecha es incorrecta.');
            document.forms[0].fecha.value="";
            return false;
        }else{
              if (dateStart>=datePasada) {
              alert('la fecha es superior a la fecha actual.');
              document.forms[0].fecha.value="";
              return false;
            }else{
              return true;
            }
        }
        return true;
    }
</script>
