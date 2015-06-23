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
		var numeroparcelas = 0;
		for (i = 0; i <= count; i++) {
			var valor = $("#valor"+i).val();
			if(valor != "") {
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
				vetorValor[numeroparcelas] = valor;
				vetorPago[numeroparcelas] = pago;
				vetorDataVencimento[numeroparcelas] = datavencimento;
				vetorDataPagamento[numeroparcelas] = datapagamento;	
				numeroparcelas++;
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

		if(numero > 0) {
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
 	hidden1 = document.getElementById("hidden1");
 	
	//Criando uma variável que armazenará as informações da linha que será criada.
	//Os campos estão sendo colocados no interior de uma div, pois a linha contém muitos elementos;
	//Basta excluir a div, para excluir todos os elementos da linha;
	//var texto = "<div id='linha"+iCount+"'><input type='text' name='texto"+iCount+"' id='texto"+iCount+"' value='Meu texto "+iCount+"'><input type='button' value='Apagar campo' onClick='removeInput(\"linha"+iCount+"\")'></div>";	  
  	var texto = "";
  	if (iCount == 0) {
  		texto = texto + "<div id='linha"+(iCount-1)+"'>"+
  							"<label class='formulario transacao' for='pago"+(iCount-1)+"'>Pago?</label>"+ 
  							"<label class='formulario transacao' for='valor"+(iCount-1)+"'>Valor</label>"+ 
  							"<label class='formulario transacao' for='datavencimento"+(iCount-1)+"'>Data de vencimento</label>"+ 
  							"<label class='formulario transacao' for='datapagamento"+(iCount-1)+"'>Data de pagamento</label></br>"+ 
						"</div>";
  	}
  	texto = texto + "<div id='linha"+iCount+"'>"+
	  				"<select id='pago"+iCount+"' name='pago"+iCount+"'>"+
							 "<option value='0'>Não</option>"+
							 "<option value='1'>Sim</option>"+
					"</select>"+
					"<input type='text' id='valor"+iCount+"' name='valor"+iCount+"' value='"+iCount+"' maxlength='50'/>"+
					"<input type='date' id='datavencimento"+iCount+"' name='datavencimento"+iCount+"'/>"+    
					"<input type='date' id='datapagamento"+iCount+"' name='datapagamento"+iCount+"'/>"+
					"<input type='button' value='Apagar' onClick='removeInput(\"linha"+iCount+"\")'>"+
				"</div>";
	//Capturando a div principal, na qual os novos divs serão inseridos:
	var camposTexto = document.getElementById('camposTexto');   
	camposTexto.innerHTML = camposTexto.innerHTML+texto;
  
	//Escrevendo no hidden os ids que serão passados via POST;
	//No código ASP ou PHP, você poderá pegar esses valores com um split, por exemplo;
		/*if (hidden1.value == "") {
			document.getElementById("hidden1").value = iCount;
		}else{
			document.getElementById("hidden1").value += ","+iCount;
		}*/
iCount++;
iCampos++;
count = document.getElementById("count");
count.value = iCount;
}   
}
   
/*//Função que remove os campos;
function removeInput(e) {
   var pai = document.getElementById('camposTexto');
   var filho = document.getElementById(e);
   hidden1 = document.getElementById("hidden1");
   var campoValor = document.getElementById("texto"+e.substring(5)).value;
   var lastNumber = hidden1.value.substring(hidden1.value.lastIndexOf(",")+1);

   if(confirm("O campo que contém o valor:\n» "+campoValor+"\nserá excluído permanentemente!\n\nDeseja prosseguir?")){
		var removido = pai.removeChild(filho);
		//Removendo o valor de hidden1:
		if (e.substring(5) == hidden1.value) {
			hidden1.value = hidden1.value.replace(e.substring(5),"");
		}else if(e.substring(5) == lastNumber) {
			hidden1.value = hidden1.value.replace(","+e.substring(5),"");
		}else{
			hidden1.value = hidden1.value.replace(e.substring(5)+",","");		
		}
	iCampos--;
	}
}*/

//Função que remove os campos;
function removeInput(e) {
	var pai = document.getElementById('camposTexto');
	var filho = document.getElementById(e);
	var removido = pai.removeChild(filho);
	iCampos--;
}