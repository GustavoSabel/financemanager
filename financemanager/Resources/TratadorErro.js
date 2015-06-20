var campoMensagem = "#msg";
var classeErro = "erro";
var classeSucesso = "sucesso";
var classeMensagem = "mensagem";

function exibirMensagemErro(mensagem) {
	$(campoMensagem).removeClass();
	$(campoMensagem).html(mensagem);
	$(campoMensagem).addClass(classeErro);
}

function exibirMensagemSucesso(mensagem) {
	$(campoMensagem).removeClass();
	$(campoMensagem).html(mensagem);
	$(campoMensagem).addClass(classeSucesso);
}

function exibirMensagemPadrao(resposta) {
	console.log(resposta);
	if (resposta.erro == 0) {
		exibirMensagemSucesso(resposta.msg)
	} else {
		exibirMensagemErro(resposta.msg)
	}
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
	$(campoMensagem).removeClass();
	$(campoMensagem).html(mensagem);
	$(campoMensagem).addClass(classeMensagem);
}
