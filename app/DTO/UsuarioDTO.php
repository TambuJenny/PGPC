<?php

class UsuarioDTO {

    public  $id;
    public $senha;
    public $idUsuario;

    public function __construct($id,$senha,$idUsuario)
    {
        $this->id = $id;
        $this->senha = $senha;
        $this->idUsuario = $idUsuario;
    }


}