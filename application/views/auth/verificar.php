
<link href="<?php echo base_url("assets/css/main.css");?>" rel="stylesheet">
<div class="container">
    <div class="row main">
        <div class="panel-heading col-md-6">
           <div class="panel-title ">

                <h1 class="title">Bienvenido <?php echo $this->session->userdata("nick")?> a su perfil de Administración</h1>

                <h2 class="title">Sus Datos personales son los siguientes:</h2>

                <h3 class="title">Cédula: <?php echo $this->session->userdata("cedula")?></h3>

                <h3 class="title">Nombres: <?php echo $this->session->userdata("nombres")?></h3>

                <h3 class="title">Apellidos: <?php echo $this->session->userdata("apellidos")?></h3>

                <h3 class="title">Correo: <?php echo $this->session->userdata("correo")?></h3>


                <hr />
            </div>
        </div>

        <div class="panel-heading col-md-6">
           <div class="panel-title img-responsive">
            <?php foreach ($men as $cmb):?>
                <img src="<?php echo base_url("imagenes/memes1");?>/<?php echo $cmb['imagen']; ?>.jpg"
                 alt="Meme">
            <?php   endforeach; ?>
                <hr />
            </div>
        </div>

    </div>
</div><br>