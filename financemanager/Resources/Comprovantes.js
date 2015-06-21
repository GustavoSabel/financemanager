$(document).ready(function(){
	$.ajax({
		type : "get",
		url : "../controller/ComprovantesController.php?operacao=listar",
		dataType : "json",
		success : function(result) {
			console.log(result);
			gerarTabela(result);
		},
		error : function(result, txt) {
			console.log(result);
			exibirMensagem(-1, txt);
		}
	});
});

function gerarTabela(arquivos) {
	$('#comprovantes tbody').html("");
	for (var i = 0; i < arquivos.length; i++) {
		addLinha(arquivos[i].caminho, arquivos[i].descricao);
	}
}

function addLinha(caminho, nome){
	var linhas =
	    " <tr>" +
		" <td>"+ nome +"</td>"+
		" <td width='16px'>"+
			" <a href='"+caminho+"' download>Visualizar</a>" +
		" </td>"+
		" </tr>";
	$('#comprovantes tbody').append(linhas);
}