$(document).ready(function() {
	$("#submit").click(function(e) {
		e.preventDefault();

		var nome = $("#nome").val();
		var login = $("#login").val();
		var senha = $("#senha").val();
		var senhaRepetida = $("#senhaRepetida").val();

		if (senha != senhaRepetida) {
			$("#msg").html("As senhas estão diferentes.");
			return;
		}

		var valores = {
			"nome" : nome,
			"login" : login,
			"senha" : senha
		};

		$("#msg").removeClass();
		$("#msg").html("Cadastrando, aguarde...");
		$.ajax({
			type : "post",
			url : "../controller/UsuarioController.php?operacao=salvar",
			dataType : "json",
			data : valores,
			success : function(result) {
				$("#msg").html(result.msg);
				if (result.erro == 0) {
					$("#msg").addClass("sucesso");
				} else {
					$("#msg").addClass("erro");
				}
			},
			error : function(result, txt) {
				console.log(result);
				$("#msg").html("Erro: " + txt);
				$("#msg").addClass("erro");
			}
		});
	});

});