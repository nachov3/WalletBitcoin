<?php
require_once("clases/conexion.php");
require_once("clases/usuarios.php");

$conexion=new conexion();
$cnn=$conexion->getCnn();

$usuLog=$_POST['usuLog'];
$sql="SELECT loginUsu FROM usuarios WHERE loginUsu ='$usuLog'";
$rs = mysqli_query($cnn,$sql) or die ("Error en la conexion");

foreach($rs  as $hola){

}

if(empty($hola['loginUsu'])){

  $sql="INSERT INTO usuarios(loginUsu, nombreUsu, apellidoUsu, passUsu, dniUsu, telefonoUsu, direccionUsu, codPostalUsu, emailUsu, fecAltaUsu) VALUES ('$_POST[usuLog]','$_POST[usuNom]','$_POST[usuApe]', md5(sha1('$_POST[usuPass]')),'$_POST[dniUsu]','$_POST[telefonoUsu]','$_POST[direccionUsu]','$_POST[codPostalUsu]','$_POST[emailUsu]','$_POST[fecAltaUsu]')";
  $rs=mysqli_query($cnn,$sql) or die ("Error en la conexion");

  sleep(2);
  header("location:login.php");


} else { ?>

  <script>
  alert("El usuario ya existe");
  window.location.href='registro.php';
  </script>
<?php } ?>
