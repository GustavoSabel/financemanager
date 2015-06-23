$(document).ready(function() {
	$("#submit").click(function(e) {
		e.preventDefault();

		var tipo = $("#tipo").val();
		var descricao = $("#descricao").val();
		var idcategoria = $("#idcategoria").val();
		var data = $("#data").val();
		var idpessoa = $("#idpessoa").val();
		var idusuario = $("#idusuario").val();

		if(tipo == ""){
			exibirMensagemErro("Tipo não informado.");
			return;
		}
		if(descricao == ""){
			exibirMensagemErro("Descrição não informada.");
			return;
		}
		if(idcategoria == ""){
			exibirMensagemErro("Categoria não informada.");
			return;
		}
		if(data == ""){
			exibirMensagemErro("Data não informada.");
			return;
		}
		if(idpessoa == ""){
			exibirMensagemErro("Pessoa não informada.");
			return;
		}
		if(idusuario == ""){
			exibirMensagemErro("Usuário não autenticado.");
			return;
		}


		var valores = {
			"tipo" : tipo,
			"descricao" : descricao,
			"idcategoria" : idcategoria,
			"data" : data,
			"idpessoa" : idpessoa,
			"idusuario" : idusuario,
			"operacao": "salvar"
		};

		exibirMensagemStatus("Cadastrando, aguarde...");
		$.ajax({
			type : "post",
			url : "../controller/TransacaoController.php?operacao=salvar",
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