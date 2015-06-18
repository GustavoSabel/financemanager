<?php
  require_once("../controller/dao/impl/CategoriaDaoImpl.php");
  require_once("../controller/funcoesController.php");
  require_once("../model/Categoria.php");

  $cadastrocategoria = "../view/cadastrocategoria.php";

  if (trim($_POST["operacao"]) == "salvar") {
    if (trim($_POST["descricao"]) == "") {
      redireMsg($cadastrocategoria, "Categoria não informada.");
    }

    $categoria = new Categoria(0, $_POST["descricao"]);
    $categoriaDao = new CategoriaDaoImpl();
    if ($categoriaDao->buscar($categoria->getDescricao()) != null) {
      redireMsg($cadastrocategoria, 'Categoria "'.$categoria->getDescricao().'" já existe.');
    }
    $categoriaDao->salvar($categoria);
    redireMsg($cadastrocategoria, "Salvo com sucesso");
  }

?>

