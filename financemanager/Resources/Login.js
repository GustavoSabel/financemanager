$(document).ready(function(){
  $("#submitLogin").click(function(e){
    e.preventDefault();

    var usuario = $("#username").val();
    var senha = $("#password").val();
    var valores = { "username": usuario, "password": senha, "operacao": "logar" };
  //  console.log(valores); 

   // valores = $("#form1").serialize();
  //  console.log(valores); 


  //  valores = '{ "username": "usuario", "password": "senha", "operacao": "logar" }';

    $("#msg").html("Validando o usuário, aguarde ...");
    $.ajax({type: "post", url: "../controller/LoginController.php",
      dataType: "json",
      data: valores, 
      success: function(result){
        if (result.erro == 0) {
          //window.location.replace("../index.php");
          //window.location.replace("http://www.w3schools.com");
          //$("#msg").html(result.msg);
          //$("#msg").addClass("sucesso");
          window.location.reload();
        } else {
          $("#msg").html(result.msg);
          $("#msg").addClass("erro");
        }
      },
      error: function(result, txt){
        //alert(result);
        console.log(result);
        $("#msg").html("Erro: " + txt);
        $("#msg").addClass("erro");
      }
    });
  });

  $("#logoff").click(function(e){
    $("#msg").html("Saindo...");
    $.ajax({type: "post", url: "../controller/LoginController.php",
      dataType: "json",
      data: { "operacao" : "logoff" }, 
      success: function(result){
        if (result.erro == 0) {
          $("#msg").html(result.msg);
          $("#msg").addClass("sucesso");
          window.location.reload();
        } else {
          $("#msg").html(result.msg);
          $("#msg").addClass("erro");
        }
      },
      error: function(result, txt){
        console.log(result);
        $("#msg").html("ERROR: " + txt);
        $("#msg").addClass("erro");
      }
    });
  });

});