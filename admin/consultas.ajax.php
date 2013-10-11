<?php
/**
 * Project: Elfic
 * Author: edison <edison [DOT] galindo [AT] gmail [DOT] com>
 * Date: Abril 20th, 2009
 * File: consultas.ajax.php
 * Version: 1.0
 */
define('APP_PATH', dirname(__FILE__) );
define( 'DS', '/' );
require_once "includes".DS."elfic.ini.php";
//include (APP_PATH.DS.'includes'.DS.'auth.inc.php'); //incluye control de autenticación

$_action = isset($_REQUEST['act'])? $_REQUEST['act'] : false;
$email = isset($_REQUEST['q'])? $_REQUEST['q'] : null;
$rut = isset($_REQUEST['rut'])? $_REQUEST['rut'] : null;
$rolId = isset($_REQUEST['rol'])? $_REQUEST['rol'] : null;
$instId = isset($_REQUEST['instId'])? $_REQUEST['instId'] : null;

switch($_action){
	case 'userfields':
		$u = new Usuarios();
		$u->getCamposRol($rolId);
	break;
	case 'cursoscombo':
		$u = new Usuarios();
		$u->getComboCursos($instId);
	break;
	case 'docentescombo':
		$i = new Institucion();
		$i->getDocentesCombo($instId);
	break;
}

if (isset($email)){
	chk_email($email);
}

if (isset($rut)){
	chk_rut($rut);
}

function chk_rut($rut){
	$db = new DB();
		$sql = "SELECT customers_id FROM customers WHERE nit = '$rut'";
		$result = $db->queryUniqueValue($sql);
		if($result){
			/*$div = "<input name=\"email_address\" type=\"text\" id=\"email_address\" size=\"30\" ";
			$div .= "maxlength=\"50\" class=\"required email\" value=\"\" >";*/
			echo "El rut existe en el sistema";
		}
}

function chk_email($email){
	$db = new DB();
		$sql = "SELECT customers_id FROM customers WHERE customers_email_address = '$email'";
		$result = $db->queryUniqueValue($sql);
		if($result){
			/*$div = "<input name=\"email_address\" type=\"text\" id=\"email_address\" size=\"30\" ";
			$div .= "maxlength=\"50\" class=\"required email\" value=\"\" >";*/
			echo "El email existe en el sistema";
		}
}
?>