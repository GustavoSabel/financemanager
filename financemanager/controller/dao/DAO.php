<?php

  interface DAO{
    public function salvar($info);
    public function excluir($identificador);
    public function buscar($identificador);
    public function listar($infoInicial, $infoFinal);
    public function editar($info);
  }
 
?>