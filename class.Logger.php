<?php

class Logger {
  
  public $url;
  public $datos;
  public $miObjeto;
  

  //Creamos constructor
  public function __construct($urlBD){
      $url = $urlBD;
      $datos = parse_url($url);


      echo 'class.'.$datos['scheme'].'LoggerBackend.php';
      echo '<br>';

      if(!isset($datos['scheme'])){
        throw new Exception("No se pudo conectar a la Base de datos");
      }
      else{
        echo ("<br>Te pudiste conectar a la Base de datos");
        echo '<br>';
        
      }
      include_once ("C:\Apache2.4\htdocs\RicardoParedes\UF3\NF3-PAC01 - Aplicacions web - Pas 2\class." . $datos['scheme']. "LoggerBackend.php");

      

      echo '<br>';
      $className = $datos['scheme'] . 'LoggerBackend';
  
    
    
      if(!class_exists($className)){
        throw new Exception('No logging backend available for ' . $datos['scheme']);
      }
    
      $this->miObjeto = new $className($urlBD);
  }
  public function mensaje($message){
      $this->miObjeto->mensaje($message);
  }
}


  
?>
