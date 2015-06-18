<?php
  require_once("../controller/dao/impl/PessoaDaoImpl.php");
  require_once("../controller/funcoesController.php");
  require_once("../model/Pessoa.php");

  $cadastropessoa = "../view/cadastropessoa.php";

  if (trim($_POST["operacao"]) == "salvar") {
    if (trim($_POST["nome"]) == "") {
      redireMsg($cadastrousuario, "Nome não informado.");
    }
    $pessoa = new Pessoa(0, $_POST["nome"], $_POST["endereco"], $_POST["email"], $_POST["telefone"]);
    $pessoaDao = new PessoaDaoImpl();
    if ($pessoaDao->buscar($pessoa->getNome()) != null) {
      redireMsg($cadastropessoa, 'Pessoa com nome "'.$pessoa->getNome().'" já existe.');
    }
    $pessoaDao->salvar($pessoa);
    redireMsg($cadastropessoa, "Salvo com sucesso");
  }

?>

