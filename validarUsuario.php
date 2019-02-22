<?php
require_once("clases/conexion.php");
require_once("clases/usuarios.php");
session_start();
$cnn=new conexion;

$usuLog = $_POST['usuLog'];
$usuPas =md5(sha1($_POST['usuPas']));

$sql="SELECT * FROM usuarios WHERE loginUsu='$usuLog' AND passUsu='$usuPas'";
$rs=mysqli_query($cnn->getCnn(),$sql) or die ("Error en la conexion");

while($fila=mysqli_fetch_array($rs)){

  $usuario1= new usuarios($fila['ID_usuario'],$fila['loginUsu'],$fila['nombreUsu'],$fila['apellidoUsu'],$fila['passUsu'],$fila['emailUsu'],$fila['fecAltaUsu']);
}
  if(!empty($usuario1)){

      $_SESSION['usuario']=$usuario1;
      echo  $_SESSION['usuario']->getUsuID();
      //header("location:admin/panel.php");

  }
 ?>
