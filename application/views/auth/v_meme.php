

<link href="<?php echo base_url("assets/css/main.css");?>" rel="stylesheet">
<div class="container">
    <div class="row main">
        <div class="panel-heading col-md-6">
           <div class="panel-title text-center">
                <h1 class="title">continuar</h1>
                <h3 class="title"><?php echo $this->session->userdata("cedula")?></h3>
                <h3 class="title"><?php echo $this->session->userdata("nombres")?></h3>
                <h3 class="title"><?php echo $this->session->userdata("apellidos")?></h3>
                <h3 class="title"><?php echo $this->session->userdata("correo")?></h3>

                <a href="<?php echo site_url('auth/verificar')?>">Continuar</a>

                <hr />
            </div>
        </div>


    </div>
</div><br>