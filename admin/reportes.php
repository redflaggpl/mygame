<?php
/**
 * @Package: ELFIC FRAMEWORK
 * @subpackage BELLUM
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.ins.net.co
 * @Date: Octubre, 2010
 * @File: index2.php
 * @Version: 1.0
 */

define('APP_PATH', dirname(__FILE__) );
define( 'DS', '/' );
include ('includes'.DS.'elfic.ini.php');
include (APP_PATH.DS.'includes'.DS.'auth.inc.php'); //incluye control de autenticación
include (APP_PATH.DS.'lib'.DS.'encuestas'.DS.'Resultados.php'); //incluye control de autenticación

$msg	= isset($_REQUEST['msg']) ? $_REQUEST['msg'] : ''; //mensajes retornados por url
$_eid	= isset($_REQUEST['eid']) ? $_REQUEST['eid'] : ''; 
$smarty = new Elfic_Smarty();

$smarty->assign('title',APP_TITULO);
$smarty->display('reportes/html_top_reportes.tpl');
$smarty->display('reportes/reportesHeader.tpl');
$smarty->assign('msg',$msg);

$_do = isset($_REQUEST['do']) ? $_REQUEST['do'] : '';
$pid = isset($_REQUEST['pid']);

switch($_do) {
    case 'basico':
    	if(!$uperms['encuestas_w']){
    		Utils::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    	    if($_eid){
    			$r = new Resultados($_eid);
    	        $r->getInforme($_eid, 'print');
    		}
    	}
    break;
}

$smarty->display('reportes/reportesFooter.tpl');