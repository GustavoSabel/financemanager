<?php
  require_once("../controller/dao/impl/TransacaoDaoImpl.php");
  require_once("../controller/funcoesController.php");
  require_once("../model/Transacao.php");

  $cadastrotransacao = "../view/cadastrotransacao.php";

  if (trim($_POST["operacao"]) == "salvar") {
    if (trim($_POST["descricao"]) == "") {
      redireMsg($cadastrotransacao, "Descrição não informada.");
    }
    if (trim($_POST["tipo"]) == "") {
      redireMsg($cadastrotransacao, "Tipo não informado.");
    }
    if (trim($_POST["data"]) == "") {
      redireMsg($cadastrotransacao, "Data não informada.");
    }
    if (trim($_POST["idusuario"]) == "") {
      redireMsg($cadastrotransacao, "Usuário não logado.");
    }
    if (trim($_POST["idpessoa"]) == "") {
      redireMsg($cadastrotransacao, "Pessoa não informada.");
    }
    if (trim($_POST["idcategoria"]) == "") {
      redireMsg($cadastrotransacao, "Categoria não informada.");
    }

    $transacao = new Transacao(0, $_POST["descricao"], $_POST["tipo"], $_POST["data"], $_POST["idusuario"], $_POST["idpessoa"], $_POST["idcategoria"]);
    $transacaoDao = new TransacaoDaoImpl();
    try {
      $transacaoDao->salvar($transacao);
    } catch (Exception $e) {
      redireMsg($cadastrotransacao, $e->getMessage());
    }
    redireMsg($cadastrotransacao, "Salvo com sucesso");
  }

?>

