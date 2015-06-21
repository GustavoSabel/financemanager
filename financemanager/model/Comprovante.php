<?php
class Comprovante {
	private $id;
	private $caminho;
	private $descricao;
	public static $TABELA = "arquivos";
	public static $CAMPO_ID = "idarquivo";
	public static $CAMPO_CAMINHO = "caminho";
	public static $CAMPO_DESCRICAO = "descricao";
	function __construct() {
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
	public function getCaminho() {
		return $this->caminho;
	}
	public function setCaminho($caminho) {
		$this->caminho = $caminho;
	}
	public function __tostring() {
		return "Comprovante: " . $this->getDescricao ();
	}
}
?>



