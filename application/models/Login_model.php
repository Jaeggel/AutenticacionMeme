<?php
class Login_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        parent::__construct();
         $this->load->library('encrypt');
        $this->load->library('session');
    }
    public function get_cedula()
    {
        $sql='select cedula from usuario where num in (select max(num) from usuario)';
        $query=$this->db->  query($sql);
        return $query->result_array();
    }
    public function set_catcha($cedula,$emoticon,$imagen,$frase1,$frase2){
        $data = array(
            'id_usuario' => $cedula,
            'emoticon' => $emoticon,
            'imagen' => $imagen,
            'frase1' => $frase1,
            'frase2' => $frase2
        );
        return $this->db->insert('catcha_usuario', $data);

    }
    public function update_catcha($cedula,$emoticon,$imagen,$frase1,$frase2){
        $this->load->helper('url');
        $data = array(
            'emoticon' => $emoticon,
            'imagen' => $imagen,
            'frase1' => $frase1,
            'frase2' => $frase2
        );
        $this->db->where('id_usuario',$cedula);

        return $this->db->update('catcha_usuario', $data);
        if($query)
       {
         return true;
       }
       else
       {
         return false;
       }

    }
    public function set_users()
    {
        $this->load->helper('url');
        ////metodo de encriptacion

        $encrypted_pass = $this->encrypt->encode($this->input->post('contraseña'));
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'cedula' => $this->input->post('cedula'),
            'contraseña' => $encrypted_pass,
            'correo' => $this->input->post('correo'),
             'fecha_nacimiento' => $this->input->post('fecha'),
             'nick' => $this->input->post('nick')
        );
        return $this->db->insert('usuario', $data);
    }
    public function comprobar($user,$pass)
    {
        $this->db->select('cedula,nombre,apellido,nick,contraseña,correo');
        $this->db->where('nick',$user);
        $query = $this->db->get('usuario');
        if ($query->num_rows()==1) {
            $consulta = $query->row();
            $encriptado = $consulta->contraseña;
            $encrypted_string = $this->encrypt->decode($encriptado);
            if (strcmp($encrypted_string, $pass) === 0) {
                return $query->result_array();
            }
         }
    }
  public function comprobarCorreo($correo)
    {
        $this->db->select('cedula,nombre,apellido,nick,contraseña,correo');
        $this->db->where('correo',$correo);
        $query = $this->db->get('usuario');
           if ($query->num_rows()==1) {
            $consulta = $query->row();
           // $nick = $consulta->nick;
             $correo = $consulta->correo;
             return $query->result_array();
         }
    }
    public function traerdatos($correo)
    {
        $this->db->select('cedula,nombre,apellido,nick,contraseña,correo');
        $this->db->where('correo',$correo);
        $query = $this->db->get('usuario');
       if ($query->num_rows()==1) {
            $consulta = $query->row();
           // $nick = $consulta->nick;
             $contraseña = $consulta->contraseña;
            $pass_des= $this->encrypt->decode($contraseña);

             return $pass_des;

         }
     }
    public function comprobarMeme($emoticon,$imagen,$frase1,$frase2)
    {
        $this->db->select('id_usuario');
        $this->db->where('imagen',$imagen);
        $this->db->where('emoticon',$emoticon);
        $this->db->where('frase1',$frase1);
        $this->db->where('frase2',$frase2);
        $query = $this->db->get('catcha_usuario');
        if($query -> num_rows() == 1)
       {
         return $query->result_array();
       }
       else
       {
         return false;
       }
    }

    public function sesiones($user)
    {
        $this->db->select('cedula,nombre,apellido,nick,contraseña,correo');
        $this->db->where('nick',$user);
        $query = $this->db->get('usuario');
        if ($query->num_rows()==1) {
            $consulta = $query->row();
            $cedula = $consulta->cedula;
            $nombre = $consulta->nombre;
            $apellido = $consulta->apellido;
            $correo = $consulta->correo;
            $nick = $consulta->nick;
            $passwd=$consulta->contraseña;

            $newdata = array(
            'cedula'  => $cedula,
            'nombres'     => $nombre,
            'apellidos'     => $apellido,
            'correo'     => $correo,
            'nick'     => $nick,
            'passwd'     => $passwd,
            'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
         }
    }

    public function cambiarCon(){
        $cAntigua= $this->input->post('cA');
        $cNueva= $this->input->post('cN');
        $cNuevaR= $this->input->post('cNR');

        $usuario=$this->session->userdata('cedula');
        $pass=$this->session->userdata('passwd');
        $encrypted_string = $this->encrypt->decode($pass);
        $ced=$this->session->userdata('cedula');

        $encrypted_paswd = $this->encrypt->encode($cNuevaR);

        if (strcmp($encrypted_string, $cAntigua) === 0) {
            if (strcmp($cNueva, $cNuevaR) === 0) {
                $data = array(
                'contraseña' => $encrypted_paswd
                );
                $this->db->where('cedula', $ced);
                $this->db->update('usuario', $data);
                echo "<script>
                    alert('La contraseña se cambio con exito');
                    window.location.assign('".site_url("auth/login")."')
                    </script>";
                    $this->session->sess_destroy();

        }else{
                echo "<script>
                    alert('Las contraseñas nuevas no coinciden');
                     window.location.assign('".site_url("auth/cambiarC")."')
                    </script>";
            }
        }else{
         echo "<script>
                    alert('La contraseña antigua no coincide');
                     window.location.assign('".site_url("auth/cambiarC")."')
                    </script>";
        }
    }

    public function val_nick($nick){
        $this->db->select('cedula,nombre,apellido,correo,nick');
        $this->db->where('nick',$nick);
        $query = $this->db->get('usuario');
        if ($query->num_rows()==1) {
            return $query->result_array();
        }
    }

    public function get_meme(){
        $ced=$this->session->userdata('cedula');
        $this->db->select('imagen');
        $this->db->where('id_usuario',$ced);
        $query = $this->db->get('catcha_usuario');
        if ($query->num_rows()==1) {
            return $query->result_array();
        }
    }

    public function val_correo($corr){
        $this->db->select('cedula,nombre,apellido,correo,nick');
        $this->db->where('correo',$corr);
        $query = $this->db->get('usuario');
        if ($query->num_rows()==1) {
            return $query->result_array();
        }
    }

}