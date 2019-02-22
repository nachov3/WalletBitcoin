<?php
require_once 'src/BitcoinPHP/BitcoinECDSA/BitcoinECDSA.php';

use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;

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
                    });
    </script>
<div class="container"></div>
</head>
<header>
<?php include("menu.php"); ?>
</header>
<body>
    <div class="center-block table-responsive-sm">
      <table class="table table-hover ">
        <tr>
          <th class="text-center" colspan="2" id="flotar-left"style="margin-left: 100px;"><img src="Imagen/bitcoin.png" width="100px"></th>
        </tr>
        <tr>
          <th class="text-left" id="ctexto" colspan="2" style="padding-left:18%;" ><span>Generar Billetera Bitcoin</span></th>
        </tr>
        <tr><td id="breakword"><?php echo "Dirección Publica : " . $address . PHP_EOL;?></td> </tr>
        <tr><td id="breakword"><?php echo "Dirección Privada (WIF) :" . $wif . PHP_EOL?></td> </tr>
  <!--  <tr>
  <td class="text-center" ><button type="button" id="btnmostrar" class="btn btn-default btn-xs">Mostrar Clave Privada</button></td>
    <td class="text-center"><button type="button" id="btnocultar" class="btn btn-default btn-xs">Ocultar Clave Privada</button></td>
  </tr>-->
  <tr>
    <div data-role="">
      <form>
        <td  id="textarea"><textarea  name="msg" rows="10"><?php echo $address;?></textarea><br></td>
        <td  id="textarea"><textarea  name="msg1" rows="10"><?php echo $wif;?></textarea><br></td>
          <tr>
            <td class="text-left" style="padding-Left:30%;"><button type="button" id="btncolor1"  class="btn btn-default btn-xs" onclick="update_qrcode()">Generar QR PUK &nbsp</button>
              <button type="button" id="btncolor2"  class="btn btn-default btn-xs" onclick="update_qrcode1()">Generar QR WIF</button>
            </td>
          </tr>
      </form>
        <tr>
          <td  style=" float:left; margin-left: 50px;"  id="qr"></td>
          <td  style=" float:left; margin-left: 50px;"  id="qr1"></td>
        </tr>
      </div>
    </tr>

      </table>
    </div>
  </body>
</html>
