<?php
require_once('class.Logger.php');
require_once('class.postgresLoggerBackend.php');
	$urlBD = "postgres://postgres:postgres@localhost:5432/logdata";
	$filePath = "file://C:/Apache2.4/htdocs/RicardoParedes/UF3/NF3-PAC01 - Aplicacions web - Pas 2/Log/prueba.log";
    
    $postgres = new Logger($urlBD);
    $file = new Logger($filePath);

    $mensajeFile = "Mensaje File Ricardo 55555 \n";
    $mensajePostgres = "Mensaje Postgres Ricardo  5555555";

    $file->mensaje($mensajeFile);
    $postgres->mensaje($mensajePostgres);

	
?>


