<?php

class usuarios {

  private $usuID;
  private $loginUsu;
  private $nombreUsu;
  private $apellidoUsu;
  private $passUsu;
  private $emailUsu;
  private $fecAltaUsu;



  function __construct($usuID="",$loginUsu="",$nombreUsu="",$apellidoUsu="",$passUsu="",$emailUsu="",$fecAltaUsu=""){

  $this->usuID=$usuID;
  $this->loginUsu=$loginUsu;
  $this->nombreUsu=$nombreUsu;
  $this->apellidoUsu=$apellidoUsu;
  $this->passUsu=$passUsu;
  $this->emailUsu=$emailUsu;
  $this->fecAltaUsu=$fecAltaUsu;

  }

  function getUsuID(){
    return $this->usuID;
  }
  function setLoginUsu($loginUsu){
    $this->loginUsu=$loginUsu;
  }
  function getLoginUsu(){
    return $this->loginUsu;
  }

  function setUsuNom($nombreUsu){
    $this->nombreUsu=$nombreUsu;
  }

  function getUsuNom(){
    return $this->nombreUsu;
  }

  function setUsuApe($apellidoUsu){
    $this->apellidoUsu=$apellidoUsu;
  }

  function getUsuApe(){
    return $this->apellidoUsu;
  }

  function getUsuPas(){
      return $this->passUsu;
  }

  function setUsuEmail($emailUsu){
    $this->emailUsu=$emailUsu;
  }

  function getUsuEmail(){
  return $this->emailUsu;
  }

  function setfecAltaUsu($fecAltaUsu){
    $this->fecAltaUsu=$fecAltaUsu;
  }

  function getfecAltUsu(){
  return $this->fecAltaUsu;
  }


 }
 ?>
