function exibirMensagemErro(mensagem) {
	$("#msg").removeClass();
	$("#msg").html(mensagem);
	$("#msg").addClass("erro");
}

function exibirMensagemSucesso(mensagem) {
	$("#msg").removeClass();
	$("#msg").html(mensagem);
	$("#msg").addClass("sucesso");
}

function exibirMensagem(codigoErro, mensagem) {
	console.log(codigoErro + " - " + mensagem);
	if (codigoErro == 0) {
		exibirMensagemSucesso(mensagem)
	} else {
		exibirMensagemErro(mensagem)
	}
}

function exibirMensagemStatus(mensagem) {
	$("#msg").removeClass();
	$("#msg").html(mensagem);
	$("#msg").addClass("mensagem");
}
