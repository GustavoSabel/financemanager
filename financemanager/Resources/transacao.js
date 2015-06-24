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


		/*var valorteste = "valor1";
		var teste = {
			valorteste : "10"
		}; 

		var valores = jsonConcat(transacao,teste);*/

		var count = $("#count").val();
		if((count == "") || (count ==0)) {
			exibirMensagemErro("Não é possível efetuar transações sem parcela.");
			return;
		}

		var vetorValor = [];
		var vetorPago = [];
		var vetorDataVencimento = [];
		var vetorDataPagamento = [];
		var numeroparcelas = -1;
		for (i = 0; i <= count; i++) {
			var valor = $("#valor"+i).val();
			if(valor != "") {
				if(valor == 0) {
					exibirMensagemErro("Valor da parcela "+i+" não pode ser zero.");
					return;
				}
				var pago = $("#pago"+i).val();
				if(pago == ""){
					exibirMensagemErro("Não foi informado se a parcela "+i+" foi paga.");
					return;
				}
				var datavencimento = $("#datavencimento"+i).val();
				if(datavencimento == ""){
					exibirMensagemErro("Data de vencimento não informada na parcela "+i+".");
					return;
				}
				var datapagamento = $("#datapagamento"+i).val();
				if(datapagamento == ""){
					exibirMensagemErro("Data de pagamento não informada na parcela "+i+".");
					return;
				}
				numeroparcelas++;
				vetorValor[numeroparcelas] = valor;
				vetorPago[numeroparcelas] = pago;
				vetorDataVencimento[numeroparcelas] = datavencimento;
				vetorDataPagamento[numeroparcelas] = datapagamento;	
			}
		}

		var transacao = {
			"tipo" : tipo,
			"descricao" : descricao,
			"idcategoria" : idcategoria,
			"data" : data,
			"idpessoa" : idpessoa,
			"idusuario" : idusuario,
			"numeroparcelas" : numeroparcelas,
			"operacao": "salvar"
		};

		if(numeroparcelas > 0) {
			var parcelas = {
				"valor" : vetorValor,
				"pago" : vetorPago,
				"datavencimento" : vetorDataVencimento,
				"datapagamento" : vetorDataPagamento	
			}
			var valores = jsonConcat(transacao,parcelas);
		} else {
			var valores = transacao;
		}

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


function jsonConcat(o1, o2) {
	for (var key in o2) {
		o1[key] = o2[key];
	}
	return o1;
}

/*
Script desenvolvido por: klonder
Postagem exclusiva em: http://www.forum.imasters.com.br
Liberado para uso e modificação.
*/

//Não altere esses valores!
var iCount = 0;
var iCampos = 1;
var hidden1; 


//Definindo quantos campos poderão ser criados (máximo);
var iCamposTotal = 10; 



//Função que adiciona os campos;
function addInput() {   
if (iCampos <= iCamposTotal) {
 	//hidden1 = document.getElementById("hidden1");
 	
	//Criando uma variável que armazenará as informações da linha que será criada.
	//Os campos estão sendo colocados no interior de uma div, pois a linha contém muitos elementos;
	//Basta excluir a div, para excluir todos os elementos da linha;
	//var texto = "<div id='linha"+iCount+"'><input type='text' name='texto"+iCount+"' id='texto"+iCount+"' value='Meu texto "+iCount+"'><input type='button' value='Apagar campo' onClick='removeInput(\"linha"+iCount+"\")'></div>";	  
  	var texto = "";
  	if (iCount == 0) {
  		texto = texto + "<div class='formulario' id='linha"+(iCount-1)+"'>"+
  							"<label for='pago"+(iCount-1)+"'>Pago?</label>          "+ 
  							"<label for='valor"+(iCount-1)+"'>Valor</label>              "+ 
  							"<label for='datavencimento"+(iCount-1)+"'>Data de vencimento</label>             "+ 
  							"<label for='datapagamento"+(iCount-1)+"'>Data de pagamento</label></br>           "+ 
						"</div>";
  	}
  	texto = texto + "<div class='formulario' id='linha"+iCount+"'>"+ "<label>"+
	  				"<select id='pago"+iCount+"' name='pago"+iCount+"'>"+
							 "<option value='0'>Não</option>"+
							 "<option value='1'>Sim</option>"+
					"</select> "+ "</label>"+
					"<input type='text' id='valor"+iCount+"' name='valor"+iCount+"' maxlength='50'/> "+
					"<input type='date' id='datavencimento"+iCount+"' name='datavencimento"+iCount+"'/> "+    
					"<input type='date' id='datapagamento"+iCount+"' name='datapagamento"+iCount+"'/> "+
					"<input type='button' value='Apagar' onClick='removeInput(\"linha"+iCount+"\")'>"+
				"</div>";
	//Capturando a div principal, na qual os novos divs serão inseridos:
	var parcelas = document.getElementById('parcelas');   
	parcelas.innerHTML = parcelas.innerHTML+texto;
  
	iCount++;
	iCampos++;
	count = document.getElementById("count");
	count.value = iCount;
	}   
}

function removeInput(e) {
	var pai = document.getElementById('parcelas');
	var filho = document.getElementById(e);
	var removido = pai.removeChild(filho);
	iCampos--;
}