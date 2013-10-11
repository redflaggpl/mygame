<?php
/**
 * @Package: ELFIC FRAMEWORK
 * @subpackage MYGAME
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com>
 * @Date: Octubre, 2010
 * @File: index2.php
 * @Version: 1.0
 */

define('APP_PATH', dirname(__FILE__) );
define( 'DS', '/' );
include ('includes'.DS.'elfic.ini.php');
include (APP_PATH.DS.'includes'.DS.'auth.inc.php'); //incluye control de autenticación

$msg	= isset($_REQUEST['msg']) ? $_REQUEST['msg'] : ''; //mensajes retornados por url
$tpl	= isset($_REQUEST['tpl']) ? $_REQUEST['tpl'] : null; //
$starting	= isset($_REQUEST['starting']) ? $_REQUEST['starting'] : 0; //offset paginador de resultados

$smarty = new Elfic_Smarty();

$smarty->assign('title',APP_TITULO);
$smarty->display('html_top.tpl');
$smarty->assign('login',$login);
$smarty->assign('usuarios', $uperms['usuarios_r']);
$smarty->assign('cursos', $uperms['cursos_r']);
$smarty->assign('instituciones', $uperms['instituciones_r']);
$smarty->assign('estudiantes', $uperms['estudiantes_r']);
$smarty->assign('docentes', $uperms['docentes_r']);
$smarty->assign('superusuario', $uperms['superusuario']);
$smarty->assign('reportes', $uperms['reportes']);

if($tpl != "clean")
{
	$smarty->display('html_header.tpl');
	$smarty->display('top_menu.tpl');
	$smarty->assign('msg',$msg);
	$smarty->display('containTop.tpl');
}


$_com = isset($_REQUEST['com']) ? $_REQUEST['com'] : 'home';
$pid = isset($_REQUEST['pid']);

switch($_com) {
    case 'usuarios':
    	if(!$uperms['usuarios_r']){
    		Utils::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
			require_once 'components'.DS.'usuarios'.DS.'usuarios.php';
    	}
    break;
    case 'instituciones':
    	if(!$uperms['instituciones_r']){
    		Utils::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		require_once 'components'.DS.'instituciones'.DS.'instituciones.php';
    	}
    	break;
    case 'desafios':
    	if(!$uperms['desafios_r']){
    		Utils::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
			require_once 'components'.DS.'desafios'.DS.'desafios.php';
    	}
    break;
    case 'cursos':
    	if(!$uperms['cursos_r']){
    		Utils::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
			require_once 'components'.DS.'cursos'.DS.'cursos.php';
    	}
    break;
    case 'reportes':
    	if(!$uperms['reportes']){
    		Utils::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		require_once 'components'.DS.'reportes'.DS.'reportes.php';
    	}
    	break;
    case 'home':
    	doCpanel();
}

if($tpl != "clean")
{
	$smarty->display('containBottom.tpl');
}

function doCpanel(){
	global $uid;
    $tpl = new Elfic_Smarty();
	$home = new Home();
	
	$utils = new Utils();
	$tpl->assign('usuario', Elfic::getNombreUsuario($uid));
	
	global $uid, $uperms;
	
	$tpl = new Elfic_Smarty();
	$tpl->assign('usuario', Elfic::getNombreUsuario($uid));
	
	$tpl->assign('usuarios', $uperms['usuarios_r']);
	$tpl->assign('cursos', $uperms['cursos_r']);
	$tpl->assign('instituciones', $uperms['instituciones_r']);
	$tpl->assign('estudiantes', $uperms['estudiantes_r']);
	$tpl->assign('docentes', $uperms['docentes_r']);
	$tpl->assign('superusuario', $uperms['superusuario']);
	$tpl->assign('reportes', $uperms['reportes']);
    $tpl->display('featCpanel.tpl');
}