<?php
  class Categoria {
    private $id;
    private $descricao;
    
    public static $TABELA = "categoria";
    public static $CAMPO_ID = "idcategoria";
    public static $CAMPO_DESCRICAO = "descricao";
    
    function __construct($id, $descricao) {
      $this->id = $id;
      $this->descricao = $descricao;
    }
    
    public function getId() {
      return $this->id;
    }
    
    public function getDescricao() {
      return $this->descricao;
    }
    
    public function setId($id) {
      $this->id = $id;
    }
    
    public function setDescricao($descricao) {
      $this->descricao = $descricao;
    }
    
    public function __tostring() {
      return "Categoria: ".$this->getDescricao();
    }
  }
?>



