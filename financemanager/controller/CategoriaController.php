<?php
require_once("funcoesController.php");
require_once("dao/impl/CategoriaDaoImpl.php");
require_once("../model/Categoria.php");
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With');

$msgRetorno = array("erro" => 99, "msg" => "Erro indefinido");

switch($_SERVER['REQUEST_METHOD'])
{
    case 'PUT':
      $msgRetorno["erro"] = 999;
      $msgRetorno["msg"] = "PUT Ainda não implementado";
      break;
    case 'DELETE':
      $msgRetorno["erro"] = 999;
      $msgRetorno["msg"] = "DELETE Ainda não implementado";
      break;
    case 'GET':
      $msgRetorno["erro"] = 999;
      $msgRetorno["msg"] = "GET Ainda não implementado";
      break;
}

$jsonFormat = json_encode($msgRetorno);
print($jsonFormat);

?>