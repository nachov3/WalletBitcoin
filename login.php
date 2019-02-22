<?php
if(!isset($_SESSION['usuario'])) { ?>

<html>
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/miEstilo.css" rel="stylesheet" media="screen">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.ui.shake.js"></script>

  <script type="text/javascript">
  $(document).ready(function()
  {

  $('#ingresar').click(function()
  {
  var usuLog=$("#usuLog").val();
  var usuPas=$("#usuPas").val();
  var dataString = 'usuLog='+usuLog+'&usuPas='+usuPas;
  if($.trim(usuLog).length>0 && $.trim(usuPas).length>0)
  {
  $.ajax({
  type: "POST",
  url: "validarUsuario.php",
  data: dataString,
  cache: false,

  beforeSend: function(){ $("#ingresar").val('Conectando...');},
  success: function(data){
  if(data){
  window.location.href = "wallet.php";
  $("#mensaje").html("<span style='color:#3ADF00'>Ingresando:</span> Ingresando. ");
  }
  else
  {
    $('#box').shake();
    $("#ingresar").val('Error')
    $("#mensaje").html("<span style='color:#cc0000'>Error:</span> Usuario y Contraseña invalida ");
  }
  }
  });

  }
  return false;
  });

  });


   function abreSinNavegacion(){
    open('login.php', 'principal', 'location=no,menubar=no,status=no,toolbar=no');
    cerrar();
   }

   function cerrar() {
    var ventana = window.self;
    ventana.opener = window.self;
    ventana.close();
   }


  </script>
</head>
<body style="background-color:#5F6160;"  onload="abreSinNavegacion()">
<div class="container">
  <font face="Courier New, Courier, monospace" color="#333333">
    <table align="center" class="table-bordered table-striped " width="50%" height="25%">
      <div id="box">
      <div id="login">
    		<form action="" method="post" name="form1" id="form1">
    			<fieldset>
    				<label for="userName" class="fontawesome-user"></label>
    				<input type="text" name="usuLog" id="usuLog"  placeholder="Usuario" required  >
    				<label for="userPwd" class="fontawesome-lock"></label>
    				<input type="password"  name="usuPas" id="usuPas" placeholder="Contraseña" required >
    				<input type="submit" value="Ingresar"  name="ingresar" id="ingresar">
            <div class="text-center"><a class="text-light" href="registro.php">Registrase</a></div>
    			</fieldset>
    		</form>
        <div id="mensaje"></div>
    	</div>
    </div>
<table>
</font>
</body>
</html>

</div>

<?php } else {

  header("location:login.php");

}  ?>

  <div align="center"><font color="white" face="Courier">Desarrollado por Ignacio Caro <b></a></div>
