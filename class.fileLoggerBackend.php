<?php

class fileLoggerBackend{
  public $hFile;
  public $path;
  public $scheme;
  public $url;
  public $datos;
  public function __construct($urlBD) {
      $url = $urlBD;
      $datos = parse_url($url);
      $esquema = $datos['scheme'];
      $ruta = $datos['path'];
    $this->hFile = fopen($ruta, 'a+'); 
            if(!is_resource($this->hFile)){     
                printf("Unable to open %s for writing. Check file permissions.", $ruta);
                return false;
            }
  }
  public function mensaje($mensaje){
    fwrite($this->hFile, $mensaje);
            
    return true;
  }

}


?>