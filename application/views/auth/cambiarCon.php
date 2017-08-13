

    <link href="<?php echo base_url("assets/css/main.css");?>" rel="stylesheet">
    <div class="container">
        <div class="row main">
            <div class="panel-heading">
               <div class="panel-title text-center">
                    <h1 class="title">Cambiar Contraseña</h1>
                    <hr/>
                </div>
            </div>

            <div class="main-login main-center">
                <form class="form-horizontal" method="post" action="#">
                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Contraseña Antigua</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="cA" id="cA"  placeholder="Ingresar su contraseña Antigua" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Contraseña Nueva</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="cN" id="cN"  placeholder="Ingresar su contraseña Nueva" required onblur="validarTamaño2()"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Repetir Contraseña</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="cNR" id="cNR"  placeholder="Repita su contraseña Nueva" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Cambiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    validarTamaño2  = function() {
        num = document.getElementById('cN').value;

        if(num.length<6 && num.length>0){
            alert('la contraseña debe ser mayor a 5 caracteres.');
            document.forms[0].cN.value="";
            return false;
        }else{
            return true;
        }
        return true;
    }
</script>