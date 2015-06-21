$(document).ready(function() {
	$("input:reset").click(function(e, a) {
		$("#editando").html("");
		$("#idCategoria").val("");
		$("#msg").html("");
	});
	
	$("#submit").click(function(e) {
		e.preventDefault();

		var operacao = "salvar";
		var id = $("#idCategoria").val();
		if(id != "") {
			operacao = "editar";
		} else {
			id = 0;
		}
		
		var categoria = $("#categoria").val();
		if (categoria == "") {
			exibirMensagemErro("Categoria não informada");
			return;
		}

		var valores = {
			"id" : id,
			"categoria" : categoria,
			"operacao" : "salvar"
		};

		exibirMensagemStatus("Cadastrando, aguarde...");
		$.ajax({
			type : "post",
			url : "../controller/CategoriaController.php?operacao=" + operacao,
			dataType : "json",
			data : valores,
			success : function(result) {
				console.log(result);
				if (result.erro == 0) {
					if(operacao=="salvar"){
						inserirCategoriaTabela(result.categoria.id, result.categoria.descricao);
					} else {
						alterarCategoriaTabela(result.categoria.id, result.categoria.descricao);
					}
					$("input:reset").trigger("click");
				}
				exibirMensagemPadrao(result);
			},
			error : function(result, txt) {
				console.log(result);
				exibirMensagem(-1, result.responseText);
			}
		});
	});
});

function deletar(idCaregoria) {
	var dados = {
		"idCategoria" : idCaregoria
	};
	$.post("../controller/CategoriaController.php?operacao=excluir", dados, function(retorno) {
		exibirMensagemPadrao(retorno);
		excluirCategoriaTabela(idCaregoria);
	});
}

function editar(categoria) {
	$("#idCategoria").val(categoria.idcategoria);
	$("#categoria").val(categoria.descricao);
	$("#editando").html("Editando categoria " + categoria.descricao);
}