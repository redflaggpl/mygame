<?php
$respuestaId =  isset($_REQUEST['respuestaId']) ? $_REQUEST['respuestaId'] : null;
 
$con = mysql_connect("localhost","root","calimenio");

if ($respuestaId != null)
{
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("echallenge", $con);
	
	mysql_query("INSERT INTO prueba (pid) VALUES ('$respuestaId')");
	
	mysql_close($con);
}
 else 
 {
 	echo "asshole";
 }
 
 ?>