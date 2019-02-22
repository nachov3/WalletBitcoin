<?php
require_once 'src/BitcoinPHP/BitcoinECDSA/BitcoinECDSA.php';
require_once 'clases/api-v1-client-php-master/src/Blockchain.php';

use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;
session_start();
if(isset($_SESSION['usuario'])){


$bitcoinECDSA = new BitcoinECDSA();
$bitcoinECDSA->generateRandomPrivateKey(); //generate new random private key

$wif = $bitcoinECDSA->getWif();
$address = $bitcoinECDSA->getAddress();
/*echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address : " . $address . PHP_EOL;
echo "WIF : " . $wif . PHP_EOL;*/

unset($bitcoinECDSA); //destroy instance

//import wif
$bitcoinECDSA = new BitcoinECDSA();
if($bitcoinECDSA->validateWifKey($wif)) {
    $bitcoinECDSA->setPrivateKeyWithWif($wif);
    $address = $bitcoinECDSA->getAddress();
    //echo "imported address : " . $address . PHP_EOL;
} else {
    echo "invalid WIF key" . PHP_EOL;
}?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js" type="text/javascript"> </script>
  <script src="js/qrcode.js"  type="text/javascript"></script>
  <script src="js/qrcode1.js"  type="text/javascript"></script>
</head>
<script>
/*  $(document).ready(function() {
    $('#ocultar').hide();
    $('#ocultar1').hide();*/

            $('#btnmostrar').click(function() {
                $('#ocultar').show();
                $('#ocultar1').show();
                // if your table has header(th), use this
                //$('td:nth-child(2),th:nth-child(2)').hide();
            });
                    $('#btnocultar').click(function() {
                        $('#ocultar').hide();
                        $('#ocultar1').hide();
                        // if your table has header(th), use this
                        //$('td:nth-child(2),th:nth-child(2)').hide();
                    });
                //});
</script>
<header>
<?php include("menu.php"); ?>
</header>
<body>

<div class="center-block table-responsive-sm">
    <table class="table ">
      <tr>
        <th class="text-center" colspan="2"><img src="imagenes/bitcoin.png" width="100px"></th>
      </tr>
      <tr>
        <th class="text-center" id="ctexto" colspan="2"><span class="txt anim-text-flow">Generar Billetera Bitcoin</span></th>
      </tr>
      <tr>
        <td class="text-center"><span class="txt anim-text-flow">Clave Pública</span></td>
        <td class="text-center"><span class="txt anim-text-flow">Clave Privada</span></th>
      </tr>
       <tr>
         <td class="text-center"><?php echo   $address . PHP_EOL;?></td>
         <td class="text-center"><?php echo  $wif . PHP_EOL?></td>
       </tr>
  <!--  <tr>
  <td class="text-center" ><button type="button" id="btnmostrar" class="btn btn-default btn-xs">Mostrar Clave Privada</button></td>
    <td class="text-center"><button type="button" id="btnocultar" class="btn btn-default btn-xs">Ocultar Clave Privada</button></td>
  </tr>-->
  <tr>
    <div>
      <form method="POST" action="almacenarDirecciones.php">
        <div align="center">
        <tr>
          <td id="textarea">
            <input Type="text"  name="msg"  value="<?php echo $address?>"></input>
          </td>
          <td id="textarea">
            <input type="text" name="msg1" value="<?php echo $wif ?>"></input>
          </td>
        </tr>
        </div>

            <td class="text-center"><button   type="button" class="btn btn-default btn-xs" onclick="update_qrcode();">Generar QR </button></td>
            <td class="text-center"><button id="btncolor"  type="button" class="btn btn-default btn-xs" onclick="update_qrcode1();">Generar QR </button></td>
          </tr>

        <tr>
          <td  class="text-center" id="qr"></td>
          <td  class="text-center" id="qr1"></td>
        </tr>
        <tr>

         <td class="text-center"><input type="submit" class="btn btn-dark" value="Almacenar Direciónes"></button></td>

        </form>
        <td class="text-center"><button id="r"  type="btn" class="btn btn-dark" onclick="location='wif.php'">Generar Nuevas Direcciónes</button>
          </tr>
      </div>



    </tr>

  </table>
</div>
  <?php
  $address = "3HTwJqEfPxpAiQrT5u5cBTx3rgVhcPaLZf";
  $url = "https://blockchain.info/address/".$address."?format=json&offset=0";
  $json = json_decode(file_get_contents($url), true);

  $totalTxs = $json["n_tx"];
  echo "Total transacciones : $totalTxs";echo "<br>";
  for($ex=0;$ex<$totalTxs;$ex+=50){
  //$address = "1HB5XMLmzFVj8ALj6mfBsbifRoD4miY36v";
  $url = "https://blockchain.info/address/".$address."?format=json&offset=$ex";
  $json = json_decode(file_get_contents($url), true);

  //total transactions
  $totalTxs = $json["n_tx"];
  //final balance
  $balanceSatoshis = $json["final_balance"];
  $balanceBitcoins = $balanceSatoshis / 100000000;
  $balanceBitcoins = number_format($balanceBitcoins, 5);

  //loop through each transaction and display all inputs and outs

  for($i=0;$i<1;$i++){

  echo "Saldo Final : $balanceBitcoins"; echo "BTC";

  }

  }
  ?>
  <script  src="js/move.js"></script>
</body>
</html>
<?php } else { ?>

<script>
alert('No tiene Autorizacion para acceder a este sitio');
window.location.href='login.php';
</script>
<?php } ?>
