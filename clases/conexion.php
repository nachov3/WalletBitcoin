<?php
class conexion{

private $servidor;
private $usuario;
private $contrasena;
private $db;
protected $cnn;


function __construct(){

if($_SERVER['HTTP_HOST']=='localhost:8080'){

  $this->servidor="localhost";
  $this->usuario="root";
  $this->contrasena="";
  $this->db="wallet";


  } else {


  $this->servidor="fdb24.awardspace.net";
  $this->usuario="2912489_wallet";
  $this->contrasena="pruebabtc3";
  $this->db="2912489_wallet";


  }
 $this->conectar();
}

function conectar(){

  $this->cnn=mysqli_connect($this->servidor,$this->usuario,$this->contrasena,$this->db) or die ("Error en la conexion");
  mysqli_query($this->cnn,"SET NAMES 'utf8'") or die ("error en la conexion");

}
  function getCnn(){
  return $this->cnn;
}



}


?>
