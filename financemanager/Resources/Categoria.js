$(document).ready(function() {
	$("#submit").click(function(e) {
		e.preventDefault();

		var categoria = $("#categoria").val();
		if (categoria == "") {
			exibirMensagemErro("Categoria não informada");
			return;
		}

		var valores = {
			"categoria" : categoria,
			"operacao" : "salvar"
		};

		exibirMensagemStatus("Cadastrando, aguarde...");
		$.ajax({
			type : "post",
			url : "../controller/CategoriaController.php?operacao=salvar",
			dataType : "json",
			data : valores,
			success : function(result) {
				exibirMensagem(result.erro, result.msg);
			},
			error : function(result, txt) {
				console.log(result);
				exibirMensagem(-1, txt);
			}
		});
	});
});

function deletar(idCaregoria) {
	var dados = { "idCategoria" : idCaregoria };
	$.post("../controller/CategoriaController.php?operacao=excluir", dados, function(retorno) {
		exibirMensagemPadrao(retorno);
		$("tr#categoria-"+idCaregoria).remove();
	});
}

function editar(idCategoria) {
	alert('editar ' + idCategoria);
}