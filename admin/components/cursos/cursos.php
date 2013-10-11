<?php
/**
 * @Package: ECHALLENGE
 * @subpackage Cursos
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.ins.net.co
 * @Date: Mayo 2, 2012
 * @filesource: cursos.php
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
$_cid = isset($_REQUEST['cid'])? $_REQUEST['cid'] : null;

switch($_do) {
    case 'search':
    	$smarty->display('cursos/cursoslist_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
		if(!$uperms['cursos_r']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		$c = new Curso();
    		$c->listarcursos($_filter);
    	}
    break;
    case 'new':
		$smarty->display('cursos/cursos_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
		if(!$uperms['cursos_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(isset($_do_save) && $_do_save == "do"){
    			$c = new Curso();
    			$c->setCurso();
    		} else {
    			$c = new Curso();
    			$c->nuevo();
    		}
    	}
    break;
	case 'edit':
		$smarty->display('cursos/cursos_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
		if(!$uperms['cursos_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(isset($do_edit) && $do_edit == "do"){
	    		$c = new Curso();
	    		$c->setCurso($_cid);
	    	} else {
	    		$c = new Curso();
	    		$c->edit($_cid);
   
    		}
    	}
    break;
    case 'borrar':
    	if(!$uperms['cursos_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		$c = new Curso();
    		$c->borrar($_cid);
    		Elfic::cosRedirect('index2.php?com=cursos', MSG_CURSOS_DEL);
    		
    	}
    	break;
}