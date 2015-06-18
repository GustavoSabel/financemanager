<?php
  class Transacao {
    private $idTransacao;
    private $descricao;
    private $tipo;
    private $data;
    private $idUsuario;
    private $idPessoa;
    private $idCategoria;
    
    public static $TABELA            = "transacao";
    public static $CAMPO_IDTRANSACAO = "idtransacao";
    public static $CAMPO_DESCRICAO   = "descricao";
    public static $CAMPO_TIPO        = "tipo";
    public static $CAMPO_DATA        = "data";
    public static $CAMPO_IDUSUARIO   = "idusuario";
    public static $CAMPO_IDPESSOA    = "idpessoa";
    public static $CAMPO_IDCATEGORIA = "categoria";
    
    function __construct($idTransacao, $descricao, $tipo, $data, $idUsuario, $idPessoa, $idCategoria) {
      $this->idTransacao = $idTransacao;
      $this->descricao   = $descricao;
      $this->tipo        = $tipo;
      $this->data        = $data;
      $this->idUsuario   = $idUsuario;
      $this->idPessoa    = $idPessoa;
      $this->idCategoria = $idCategoria;
    }
    
    
    public function getIdTransacao() {
      return $this->idTransacao;
    }
    
    public function getDescricao() {
      return $this->descricao;
    }
    
    public function getTipo() {
      return $this->tipo;
    }

    public function getData() {
      return $this->data;
    }

    public function getIdUsuario() {
      return $this->idUsuario;
    }

    public function getIdPessoa() {
      return $this->idPessoa;
    }

    public function getIdCategoria() {
      return $this->idCategoria;
    }

    public function setIdTransacao($idTransacao) {
      $this->idTransacao = $idTransacao;
    }
    
    public function setDescricao($descricao) {
      $this->descricao = $descricao;
    }
    
    public function setTipo($tipo) {
      $this->tipo = $tipo;
    }

    public function setData($data) {
      $this->data = $data;
    }

    public function setIdUsuario($idUsuario) {
      $this->idUsuario = $idUsuario;
    }

    public function setIdPessoa($idPessoa) {
      $this->idPessoa = $idPessoa;
    }

    public function setIdCategoria($idCategoria) {
      $this->idCategoria = $idCategoria;
    }
    
    public function __tostring() {
      return "ID: ".$this->getIdTransacao()."</br>".
             "Descrição: ".$this->getDescricao()."</br>".
             "Tipo: ".$this->getTipo()."</br>".
             "Data: ".$this->getData()."</br>".
             "Usuário: ".$this->getIdUsuario()."</br>".
             "Pessoa: ".$this->getIdPessoa()."</br>".
             "Categoria: ".$this->getIdCategoria();
    }
  }
?>