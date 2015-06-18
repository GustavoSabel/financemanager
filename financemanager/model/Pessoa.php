<?php
  class Pessoa {
    private $idPessoa;
    private $nome;
    private $endereco;
    private $email;
    private $telefone;
    
    public static $TABELA         = "pessoa";
    public static $CAMPO_IDPESSOA = "idpessoa";
    public static $CAMPO_NOME     = "nome";
    public static $CAMPO_ENDERECO = "endereco";
    public static $CAMPO_EMAIL    = "email";
    public static $CAMPO_TELEFONE = "telefone";
    
    function __construct($idPessoa, $nome, $endereco, $email, $telefone) {
      $this->idPessoa = $idPessoa;
      $this->nome     = $nome;
      $this->endereco = $endereco;
      $this->email    = $email;
      $this->telefone = $telefone;
    }
    
    public function getIdPessoa() {
      return $this->idPessoa;
    }
    
    public function getNome() {
      return $this->nome;
    }
    
    public function getEndereco() {
      return $this->endereco;
    }
    
    public function getEmail() {
      return $this->email;
    }

    public function getTelefone() {
      return $this->telefone;
    }
    
    public function setIdPessoa($idPessoa) {
      $this->idPessoa = $idPessoa;
    }
    
    public function setNome($nome) {
      $this->nome = $nome;
    }
    
    public function setEndereco($endereco) {
      $this->endereco = $endereco;
    }
    
    public function setEmail($email) {
      $this->email = $email;
    }

    public function setTelefone($telefone) {
      $this->telefone = $telefone;
    }
    
    public function __tostring() {
      return "ID: ".$this->getIdPessoa()."</br>".
             "Nome: ".$this->getNome()."<br>".
             "Endereço: ".$this->getEndereco()."<br>".
             "E-mail: ".$this->getEmail()."<br>".
             "Telefone: ".$this->getTelefone();
    }
  }
?>