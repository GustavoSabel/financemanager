<?php
  class Usuario {
    private $idUsuario;
    private $nome;
    private $login;
    private $senha;
    
    public static $TABELA = "usuario";
    public static $CAMPO_IDUSUARIO = "idusuario";
    public static $CAMPO_NOME = "nome";
    public static $CAMPO_LOGIN = "login";
    public static $CAMPO_SENHA = "senha";
    
    function __construct($idUsuario, $nome, $login, $senha) {
      $this->idUsuario = $idUsuario;
      $this->nome = $nome;
      $this->login = $login;
      $this->senha = $senha;
    }
    
    public function getIdUsuario() {
      return $this->idUsuario;
    }
    
    public function getNome() {
      return $this->nome;
    }
    
    public function getLogin() {
      return $this->login;
    }
    
    public function getSenha() {
      return $this->senha;
    }
    
    public function setIdUsuario($idUsuario) {
      $this->idUsuario = $idUsuario;
    }
    
    public function setNome($nome) {
      $this->nome = $nome;
    }
    
    public function setLogin($login) {
      $this->login = $login;
    }
    
    public function setSenha($senha) {
      $this->senha = $senha;
    }
    
    public function __tostring() {
      return "Nome: ".$this->getNome()."<br>".
             "Login: ".$this->getLogin();
    }
  }
?>