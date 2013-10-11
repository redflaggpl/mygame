<?php
/**
 * @Package: ECHALLENGE
 * @subpackage Instituciones
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.ins.net.co
 * @Date: Mayo 2, 2012
 * @filesource: instituciones.php
 * @Version: 1.0
 */


$smarty = new Elfic_Smarty();
$smarty->display('start_menubar.tpl');


$msg	= isset($_GET['msg']) ? $msg : '';

$_do = isset($_REQUEST['do']) ? $_REQUEST['do'] : 'search';
$_auth = isset($_REQUEST['auth'])? $_REQUEST['auth'] : null; //si esta o no activo
$do_edit = isset($_REQUEST['do_edit']) ? $_REQUEST['do_edit'] : null;
$_filter = isset($_REQUEST['filter']) ? $_REQUEST['filter'] : null;
$_do_save = isset($_REQUEST['do_save'])? $_REQUEST['do_save'] : null;
$_i_id = isset($_REQUEST['iid'])? $_REQUEST['iid'] : null;

switch($_do) {
    case 'search':
    	$smarty->display('instituciones/institucioneslist_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
		if(!$uperms['instituciones_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		$i = new Institucion();
    		$i->listarInstituciones($_filter);
    	}
    break;
    case 'new':
		$smarty->display('instituciones/instituciones_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
		if(!$uperms['instituciones_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(isset($_do_save) && $_do_save == "do"){
    			$i = new Institucion();
    			$i->setInstitucion();
    		} else {
    			$i = new Institucion();
    			$i->nuevo();
    		}
    	}
    break;
	case 'edit':
		$smarty->display('instituciones/instituciones_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
		if(!$uperms['instituciones_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(isset($do_edit) && $do_edit == "do"){
	    		$i = new Institucion();
	    		$i->setInstitucion($_i_id);
	    	} else {
	    		$i = new Institucion();
	    		$i->edit($_i_id);
   
    		}
    	}
    break;
    case 'borrar':
    	if(!$uperms['instituciones_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		$i = new Institucion();
    		$i->borrar($_i_id);
    	}
    	break;
}