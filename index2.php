<?php
/**
 * @Package: ELFIC FRAMEWORK
 * @subpackage BELLUM
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.ins.net.co
 * @Date: Octubre, 2010
 * @File: index2.php
 * @Version: 1.0
 */
define('_ELFEXEC', 	1);
define('APP_PATH', dirname(__FILE__) );
define( 'DS', '/' );
include ('includes'.DS.'elfic.ini.php');
include (APP_PATH.DS.'includes'.DS.'auth.inc.php'); //incluye control de autenticación

$msg	= isset($_REQUEST['msg']) ? $_REQUEST['msg'] : ''; //mensajes retornados por url
$starting	= isset($_REQUEST['starting']) ? $_REQUEST['starting'] : 0; //offset paginador de resultados

$smarty = new Elfic_Smarty();

$_com = isset($_REQUEST['com']) ? $_REQUEST['com'] : 'desafios';
$pid = isset($_REQUEST['pid']);

switch($_com) {
    case 'usuarios':
    	if(!$uperms['usuarios_r']){
    		Utils::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
			require_once 'components'.DS.'usuarios'.DS.'usuarios.php';
    	}
    break;
    case 'desafios':
    	if(!$uperms['desafios_r']){
    		Utils::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
			require_once 'components'.DS.'desafios'.DS.'desafios.php';
    	}
    break;
    case 'interfaz':
    	$smarty->assign('title',APP_TITULO);
		$smarty->display('html_top.tpl');
		$smarty->assign('login',$login);
		//$smarty->display('html_header.tpl');
		$smarty->display('top_menu.tpl');
		$smarty->assign('msg',$msg);
		$smarty->display('containTop.tpl');
    	doCpanel();
    	$smarty->display('containBottom.tpl');
}

function doCpanel(){
    $tpl = new Elfic_Smarty();
	$home = new Home();
	
	$utils = new Utils();
	
    $tpl->display('interfaz.tpl');
}