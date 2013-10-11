<?php
define('APP_PATH', dirname(__FILE__) );

define( 'DS', '/' );

include ('includes/elfic.ini.php');

$row = 1; 
$f = fopen ("preguntas.csv","r"); 
$i = 1;
while ($data = fgetcsv ($f, 1000, ";")) 
{ 
	$p['pregunta'] = $data[0];
	$p['escenario_id'] = getEscenario($data[6]);
	$p['respuestas_id'] = 0;
	$p['desafios_tipos'] = $data[5];
	$p['subniveles_id'] = $data[6];
	$p['descripcion'] = $data[7];
	$p['medio'] = $data[8];
	
	$db = new DB();
	$db->perform('preguntas', $p);
	/*if(!$db->perform('preguntas', $p))
	{
		$err = "Error en pregrunta ".$i;
	} else {*/
		$pid = $db->lastInsertedId();
		
		for($i=1 ; $i<5 ;$i++)
		{
			$db2 = new DB();
			$r['respuesta'] = $data[$i];
			$r['tipos_desafios_id'] = $data[5];
			$r['preguntas_id'] = $pid;
			$db2->perform('respuestas', $r);
			$rid = $db2->lastInsertedId();
			if($i == 2){
				$db3 = new DB();
				$sql = "UPDATE preguntas SET respuestas_id = '$rid' WHERE id='$pid'";
				$db3->execute($sql);
			}
		}
	//}
	$i++;
	echo "Iteración: ".$i. " Pregunta: ". $pid."<br>";
}

fclose ($f);

function getEscenario($subnivel)
{
    if($subnivel == 1  || $subnivel == 2)  return 1;
    if($subnivel == 3  || $subnivel == 4)  return 2;
    if($subnivel == 5  || $subnivel == 6)  return 3;
    if($subnivel == 7  || $subnivel == 8)  return 4;
    if($subnivel == 9  || $subnivel == 10) return 1;
    if($subnivel == 11 || $subnivel == 12) return 2;
    if($subnivel == 13 || $subnivel == 14) return 3;
    if($subnivel == 15 || $subnivel == 16) return 4;
}