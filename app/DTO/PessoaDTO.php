<?php 

class PessoaDTO 
{
    public $id;
    public $nome;
    public $email;
    public $endereco;
    public $data_nascimento;
    public $telefone;
    public $bi;

    public function __construct($id,$nome,$email,$endereco,$data_nascimento,$telefone,$bi)
    {
        $this-> id = $id;
        $this-> nome = $nome;
        $this-> email = $email;
        $this-> endereco = $endereco;
        $this-> data_nascimento = $data_nascimento;
        $this-> telefone = $telefone;
        $this-> bi = $bi;
    }

    public function getId ()
    {
        return $this-> id;
    }
    public function setId ($id)
    {
        $this-> id= $id;
    }
    public function getEndereco ()
    {
        return $this-> endereco;
    }
    public function setEndereco ($endereco)
    {
         $this-> endereco = $endereco;
    }
    public function getEmail ()
    {
        return $this-> email;
    }
    public function setEmail ($email)
    {
         $this-> email= $email;
    }
    public function getDataNascimento ()
    {
        return $this-> data_nascimento;
    }
    public function setDataNascimento ($data_nascimento)
    {
         $this-> data_nascimento = $data_nascimento;
    }
    public function getNome ()
    {
        return $this-> nome;
    }
    public function setNome ($nome)
    {
         $this-> id= $nome;
    }
    public function getTelefone()
    {
        return $this-> telefone;
    }
    public function setTelefone ($telefone)
    {
         $this-> id= $telefone;
    }
    public function getBi()
    {
        return $this-> bi;
    }
    public function setBi ($bi)
    {
         $this-> id= $bi;
    }

}