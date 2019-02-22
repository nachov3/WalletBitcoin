  <?php
  require_once("../clases/conexion.php");
  require_once("../clases/usuarios.php");
  session_start();

  if(isset($_SESSION['usuario']))
  {
  $conexion=new conexion; ?>
<html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/style2.css" rel="stylesheet" media="screen">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
 <header>
   <?php include("../menu.php") ?>
 </header>
<body style="background-color:#000000;">
<div class="container">
  <div class="table-responsive">
 <?php  if(!isset($_POST['enviar'])){ ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <font face="Courier New, Courier, monospace" color="#333333">
      <table  class="table-condensed  table-hover" align="center" width="50%">
        <tr><td colspan="2" align="center"><h4><span class="txt anim-text-flow">Cambiar Contrasena</span></h4></td></tr>
        <tr><td><font color="#FFFFFF">Ingrese su contrasena actual</font></td>
        <td><input type="password" value="" name="passActual"></td>
        </tr>
        <tr><td><font color="#FFFFFF">Ingrese su nueva contrasena</font></td>
        <td><input type="password" value="" name="nuevaPass"></td>
        </tr>
        <tr><td><font color="#FFFFFF">Repita su nueva contrasena</font></td>
        <td><input type="password" value="" name="repetirNuevaPass"></td>
        </tr>
        <tr><td colspan="2"><input type="submit" value="Cambiar Contraseña"  name="enviar" class="btn btn-light"></td></tr>
        <?php if(isset($_GET['error'])){?>
        <tr><td bgcolor="red" colspan="2">Contraseñas Invalidas</td></tr>
      <?php } ?>
      </table>
    </form>
    <div align="center">
    <a href="datosUsuario.php" class="btn btn-danger">Volver</a>
    </div>
    </div>
  </div>

    <?php } else {

        $usuarioID=$_SESSION['usuario']->getUsuID();
        $sql="SELECT passUsu FROM usuarios WHERE ID_usuario='$usuarioID'";
        $rs=mysqli_query($conexion->getCnn(),$sql) or die ("Error en la conexion");

        $fila=mysqli_fetch_array($rs);

        if(md5(sha1($_POST['passActual']))==$fila['passUsu'] AND md5(sha1($_POST['nuevaPass']))==md5(sha1($_POST['repetirNuevaPass']))){

        $sql1="UPDATE usuarios SET passUsu=md5(sha1('$_POST[nuevaPass]')) WHERE ID_usuario='$usuarioID'";
        mysqli_query($conexion->getCnn(),$sql1) or die ("Error en la conexion");

        header("location:datosUsuario.php");

      } else {

        header("location:frmUpdateContrasena.php?error");

      }


    } ?>
</div>
<script  src="../js/move.js"></script>
</body>
</hmtl>

<?php } else { ?>
<script>
alert('No tiene Autorizacion para acceder a este sitio');
window.location.href='../login.php';
</script>
<?php } ?>
