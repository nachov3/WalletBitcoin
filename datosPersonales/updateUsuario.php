<?php
  require_once("../clases/conexion.php");
  require_once("../clases/usuarios.php");
  session_start();
  $conexion=new conexion;
  $usuarioID=$_SESSION['usuario']->getUsuID();

  $sql="UPDATE usuarios SET loginUsu='$_POST[loginUsu]', nombreUsu='$_POST[nombreUsu]', apellidoUsu='$_POST[apellidoUsu]', dniUsu='$_POST[dniUsu]', telefonoUsu='$_POST[telefonoUsu]', direccionUsu='$_POST[direccionUsu]', emailUsu='$_POST[emailUsu]' WHERE ID_usuario='$usuarioID'";
  $rs=mysqli_query($conexion->getCnn(),$sql) or die (mysqli_error($sql));

  sleep(2);
  header("location:datosUsuario.php");

 ?>
