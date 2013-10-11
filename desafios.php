<?php
define('APP_PATH', dirname(__FILE__) );

define( 'DS', '/' );

include ('includes/elfic.ini.php');

$row = 1; 
$f = fopen ("desafios.csv","r"); 

while ($data = fgetcsv ($f, 1000, ";")) 
{ 
	$p['descripcion'] = $data[0];
	$p['desafios_tipos_id'] = $data[1];
	
	$db = new DB();
	$db->perform('desafios', $p);
	
}

fclose ($f);