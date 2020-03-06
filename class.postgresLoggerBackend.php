<?php
require_once ("class.pdofactory.php");
require_once ("abstract.databoundobject.php");



class postgresLoggerBackend{  
        public $objPostgres;
        public $url;
        public $datos;
        public function __construct($urlBD) {
            $url = $urlBD;
            $datos = parse_url($url);


            $strDSN = "pgsql:dbname=postgres;host=localhost;port=5432;user=postgres;
                        password=postgres";
            $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "postgres", array());
            $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->objPostgres = new conexion($objPDO);

        }

            

        public function mensaje($message){
            $this->objPostgres->mensaje($message);
            $this->objPostgres->setMessage($message)->Save();
        }
   
        
}

class conexion extends DataBoundObject{
        protected $Message;
        protected $Loglevel;
        protected $Logdate;
        protected $Module;
        public function DefineTableName() {
                return("logdata");
        }

        public function DefineRelationMap() {
                return(array(
                        "message" => "Message",
                        "loglevel" => "Loglevel",
                        "logdate" => "Logdate",
                        "module" => "Module"));
        }

}





?>