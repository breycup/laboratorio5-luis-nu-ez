<?php


class usuario{
    private $usuario;
    private $password;
    private $sald;
    private $nombre;
    
    public function __construct($usuario,$password,$sald,$nombre){
        $this->usuario=$usuario;
        $this->password=$password;
        $this->sald=$sald;
        $this->nombre=$nombre;
    }

    public function valida_usuario(){
        #password= hash1(password_usuario . salt)
        #salt=md5(random_bytes(20))
        #F2Qxxpy7H8to
        $tabla[]=["usuario"=>"luisn","password"=>"3678d9da50a5cf7ab8f39970bd0039888cdf28ae","salt"=>"F2Qxxpy7H8to","nombre"=>"luis nuñez"];
        foreach($tabla as $t){
            $pass= sha1($this->password.$t["salt"]);
            if ($this->usuario ==$t["usuario"] && $pass == $t["password"])
                return $t;
        }
        return []; 
    }

}



?>