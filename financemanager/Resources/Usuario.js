$(document).ready(function() {
	$("#submit").click(function(e) {
		e.preventDefault();

		var nome = $("#nome").val();
		var login = $("#login").val();
		var senha = $("#senha").val();
		var senhaRepetida = $("#senhaRepetida").val();

		if (senha != senhaRepetida) {
			exibirMensagemErro("As senhas estão diferentes.");
			return;
		}

		var valores = {
			"nome" : nome,
			"login" : login,
			"senha" : senha
		};

		exibirMensagemStatus("Cadastrando, aguarde...");
		$.ajax({
			type : "post",
			url : "../controller/UsuarioController.php?operacao=salvar",
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