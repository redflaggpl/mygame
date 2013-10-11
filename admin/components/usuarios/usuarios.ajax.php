<?php
/**
 * Project: Elfic
 * Author: edison <edison [DOT] galindo [AT] gmail [DOT] com>
 * Date: Abril 20th, 2009
 * File: consultas.ajax.php
 * Version: 1.0
 */

$_action = isset($_REQUEST['act'])? $_REQUEST['act'] : false;
$email = isset($_REQUEST['q'])? $_REQUEST['q'] : null;
$rut = isset($_REQUEST['rut'])? $_REQUEST['rut'] : null;
$rolId = isset($_REQUEST['rol'])? $_REQUEST['rol'] : null;
$_uid = isset($_REQUEST['uid'])? $_REQUEST['uid'] : NULL; //id usuario
$_grupo_id = isset($_REQUEST['gid'])? $_REQUEST['gid'] : NULL; //id grupo

switch($_action){
	case 'userfields':
		$u = new Usuarios();
		$u->getCamposRol($rolId);
	break;
	case 'userfields':
		$u = new Usuarios();
		$u->getCamposRol($rolId);
	break;
	case 'setGroup':
		if(!$_grupo_id || !$_uid){
			echo "error, contacte al administrador";
		}
		else {
			$grupo = new Grupos();
			$grupo->setUsuario($_uid, $_grupo_id);
		}
	break;
	case 'unsetGroup':
		if(!$_grupo_id || !$_uid){
			echo "error, contacte al administrador";
		}
		else {
			$grupo = new Grupos();
			$grupo->unsetUsuario($_uid, $_grupo_id);
		}
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