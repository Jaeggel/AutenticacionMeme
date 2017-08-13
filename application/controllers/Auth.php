<?php
class Auth extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('login_model');
            $this->load->helper('url_helper');
            $this->load->helper('url');
    }
    public function index()
    {

        $this->load->helper('form');
        if(!isset($_POST['user'])){
            $this->load->view('templates/header');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        }else{

            $validar['usuario']=$this->login_model->comprobar($_POST['user'],$_POST['clave']);

            if($validar['usuario'])
            {
                echo "<script>
                alert('Usuario Verificado');
                </script>";

                $this->login_model->sesiones($_POST['user']);

                $this->load->view('templates/header3');
                $this->load->view('auth/verifmeme',$validar);
                $this->load->view('templates/footer');

            }else{    //    Si no logró validar
                    echo "<script>
                    alert('Su usuario o contraseña son incorrectos');
                    </script>";
                    $this->load->view('templates/header');
                    $this->load->view('auth/login');
                    $this->load->view('templates/footer');
                }
            }
    }

public function restablecer()
    {


        $this->load->helper('form');
        if(!isset($_POST['correo'])){
            $this->load->view('templates/header');
            $this->load->view('auth/restablecer');
            $this->load->view('templates/footer');
        }else{

            $validar['usuario']=$this->login_model->comprobarCorreo($_POST['correo']);

            if($validar['usuario']){
                    echo "<script>
            alert('Correo Valido...');
            </script>";

            $this->load->view('templates/header');
            $this->load->view('auth/correo');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
              echo "<script>
            alert('El link para restauracion de clave ha sido enviado a su correo...');
            </script>";
                }
                else{    //    Si no logró validar
                     echo "<script>
                    alert('Correo no valido...');
                    </script>";
                    $this->load->view('templates/header');
                    $this->load->view('auth/restablecer');
                    $this->load->view('templates/footer');
                }
            }
    }
    /*public function verificar()
    {
        $this->load->helper('form');
        $emoticon=$this->input->post('emoji1');
        $imagen=$this->input->post('meme1');
        $frase1=$this->input->post('top1');
        $frase2=$this->input->post('bottom1');
         echo "<script>
                alert('hola mundo $imagen');
                </script>";


            if($this->login_model->comprobarMeme($emoticon,$imagen,$frase1,$frase2)){
                echo "<script>
                alert('Usuario Válido...');
                </script>";

                $this->load->view('templates/header2');
                $this->load->view('auth/verificar');
                $this->load->view('templates/footer');
            }
            else{
                 echo "<script>
                alert('Usuario No valido...');
                </script>";
                $this->load->view('templates/header');
                $this->load->view('auth/login');
                $this->load->view('templates/footer');
            }
    }*/

    public function verificar()
    {
        //$this->load->helper('form');
        $emoticon=$this->input->post('emoji1');
        $imagen=$this->input->post('meme1');
        $frase1=$this->input->post('top1');
        $frase2=$this->input->post('bottom1');
        $data=$this->login_model->comprobarMeme($emoticon,$imagen,$frase1,$frase2);
        echo json_encode($data);
    }

    public function verificar2()
    {
        $data['men'] = $this->login_model->get_meme();
        $this->load->view('templates/header2');
        $this->load->view('auth/verificar',$data);
        $this->load->view('templates/footer');
    }

    public function memegen()
    {
        $data['auth'] = $this->login_model->get_cedula();
        $this->load->view('templates/header');
        $this->load->view('auth/memegen',$data);
        $this->load->view('templates/footer');
    }
    public function verifmeme()
    {
        $this->load->helper('form');
        $this->load->view('templates/header');
        $this->load->view('auth/verifmeme');
        $this->load->view('templates/footer');
    }
    public function cambiarMeme()
    {
        $this->load->helper('form');
        $this->load->view('templates/header2');
        $this->load->view('auth/cambiarMeme');
        $this->load->view('templates/footer');
    }



    public function guardar_meme(){
        $cedula=$this->input->post('ced');
        $emoticon=$this->input->post('emoji');
        $imagen=$this->input->post('meme');
        $frase1=$this->input->post('top');
        $frase2=$this->input->post('bottom');
        $this->login_model->set_catcha($cedula,$emoticon,$imagen,$frase1,$frase2);

    }
    public function update_meme(){
        $cedula=$this->input->post('ced');
        $emoticon=$this->input->post('emoji');
        $imagen=$this->input->post('meme');
        $frase1=$this->input->post('top');
        $frase2=$this->input->post('bottom');

        $data=$this->login_model->update_catcha($cedula,$emoticon,$imagen,$frase1,$frase2);
        echo json_encode($data);

    }
    public function register()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('cedula', 'cedula', 'required');
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('apellido', 'apellido', 'required');
        $this->form_validation->set_rules('nick', 'nick', 'required');
        $this->form_validation->set_rules('correo', 'correo', 'required');
        $this->form_validation->set_rules('contraseña', 'contraseña', 'required');
        $this->form_validation->set_rules('fecha', 'fecha', 'required');


        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('auth/register');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->login_model->set_users();
            echo "<script>
            alert('Usuario Ingresado...');
            window.location.assign('".site_url("auth/memegen")."')
            </script>";
        }
    }

    public function login()
    {
        $this->load->helper('form');
        $this->load->view('templates/header');
        $this->load->view('auth/login');
        $this->load->view('templates/footer');
    }
    public function about()
    {
        $this->load->view('templates/header');
        $this->load->view('auth/about');
        $this->load->view('templates/footer');
    }

    public function about2()
    {
        $this->load->view('templates/header2');
        $this->load->view('auth/about');
        $this->load->view('templates/footer');
    }

    public function cerrar_sesion() {
      $this->session->sess_destroy();
      $this->load->helper('form');
        $this->load->view('templates/header');
        $this->load->view('auth/login');
        $this->load->view('templates/footer');

    }

    public function cambiarC() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('cA', 'cA', 'required');
        $this->form_validation->set_rules('cN', 'cN', 'required');
        $this->form_validation->set_rules('cNR', 'cNR', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header2');
                $this->load->view('auth/cambiarCon');
                $this->load->view('templates/footer');
            }
            else{
                $this->login_model->cambiarCon();

                /*$this->session->sess_destroy();
                $this->load->view('templates/header');
                $this->load->view('auth/login');
                $this->load->view('templates/footer');*/
            }
    }

    public function valNick(){
        $nick=$_POST['N_NICK'];
        $data=$this->login_model->val_nick($nick);
        echo json_encode($data);
           /* if($validar['nick']){
                 echo "<script>
                    alert('El nick de usuario ya existe');
                    </script>";
            }else{
                echo "<script>
                    alert('El nick de usuario ya existe');
                    </script>";
            }*/
    }

    public function valCorreo(){
        $corr=$_POST['C_USER'];
        $data=$this->login_model->val_correo($corr);
        echo json_encode($data);
    }

}