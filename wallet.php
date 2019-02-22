<?php
use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;
require_once("clases/usuarios.php");
require_once 'src/BitcoinPHP/BitcoinECDSA/BitcoinECDSA.php';
require_once 'clases/api-v1-client-php-master/src/Blockchain.php';
require_once("clases/conexion.php");
session_start();
if(isset($_SESSION['usuario'])) {



$conexion= new conexion;
$cnn=$conexion->getCnn();

$usuID=$_SESSION['usuario']->getUsuID();
/*
$hola="INSERT INTO direcciones (clave_publica, clave_privada) VALUES ('1CUDqzBVpRPWsQQeQzUVmRAY4N6zcpZF7W', 'KyCToVJZjapNJM7YG2LAE7Xxh95MRxU4oGRTAFq9WxboETEGnUjv')";
$sql1=mysqli_query($cnn,$hola) or die (mysqli_error($cnn));*/

$_pagi_sql="SELECT * FROM direcciones WHERE ID_usuario=$usuID";
$_pagi_result=mysqli_query($cnn,$_pagi_sql) or die (mysqli_error($_pagi_sql));
require_once 'clases/paginator.inc.php';
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>#webdev series - Colorful text animation #updated</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style2.css">

    <script language="javascript">
    $(document).ready(function() {
    	$(".botonExcel").click(function(event) {
    		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
    		$("#FormularioExportacion").submit();
    });
    });
    </script>


</head>
<header>
<?php include("menu.php"); ?>
</header>

<body>
 <div class="center-block table-responsive-sm" id="dvData" >
  <table class="table table-striped" id="Exportar_a_Excel">
    <tr>
      <th class="text-center" id="ctexto" colspan="3"><span class="txt anim-text-flow">Wallet BTC</span></th>
    </tr>
        <td class="text-center"><span class="txt anim-text-flow">BTC</span></td>
        <td class="text-center"><span class="txt anim-text-flow">CLAVE PÚBLICA</span></td>
        <td class="text-center"><span class="txt anim-text-flow">CLAVE PRIVADA</span></td>
      <?php


     $balanceBitcoinst=0;

      foreach($_pagi_result as $fila) {

        $address = $fila['clave_publica'];
        $url = "https://blockchain.info/address/".$address."?format=json&offset=0";
        @$json = json_decode(file_get_contents($url), true);?>

      <tr>
        <td class="text-center"><span class="txt anim-text-flow"><?php echo $balanceSatoshis = $json["final_balance"] / 100000000;?></span></td>
        <td class="text-center"><?php echo $fila['clave_publica']?></td>
        <td class="text-center"><?php echo $fila['clave_privada']?></td>
      <?php



      $totalTxs = $json["n_tx"];
      /* "Total transaction : $totalTxs";echo "<br>";*/
      $ex=0;
    //$address = "1HB5XMLmzFVj8ALj6mfBsbifRoD4miY36v";
      $url = "https://blockchain.info/address/".$address."?format=json&offset=$ex";
      @$json = json_decode(file_get_contents($url), true);

    //total transactions
      $totalTxs = $json["n_tx"];
    //final balance
      $balanceSatoshis = $json["final_balance"];
      $balanceBitcoinst += $balanceSatoshis / 100000000;
      //$balanceBitcoinst = number_format($balanceBitcoinst, 8);

    }



   ?>
    </table>
</div>
<!-- <div class="container">
    <span class="txt anim-text-flow">0.000125485 BTC.</span>
  </div>-->


<?php

  //loop through each transaction and display all inputs and outs

  for($i=0;$i<1;$i++){ ?>
      <div class="text-center">
        <span id="spantext" class="txt anim-text-flow">Total Bitcoins: <?php echo $balanceBitcoinst ?> BTC </span>
        <p id="quitarcssa"><?php echo $_pagi_navegacion ?></p>
      </div>
    <?php } ?>
    <script  src="js/move.js"></script>


    <form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
    <span class="botonExcel"><p  class="btn btn-dark">Exportar a Excel<img src="imagenes/export_to_excel.gif"  /></p></span>
    <input type="hidden" id="datos_a_enviar" name="datos_a_enviar"  />
    </form>
    <!----------------------------------------------------------------->
  </body>
</html>
<?php } else {

  header("location:login.php");

}  ?>
