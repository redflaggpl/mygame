<?php
/**
 * @Package: eChallenge (Elfic Framework)
 * @subpackage Usuarios
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.ins.net.co
 * @Date: Enero 15, 2011
 * @File: usuarios.php
 * @Version: 1.0
 */

$smarty = new Elfic_Smarty();
$smarty->display('start_menubar.tpl');


$msg	= isset($_GET['msg']) ? $msg : '';

$_do = isset($_REQUEST['do']) ? $_REQUEST['do'] : 'search';
$_auth = isset($_REQUEST['auth'])? $_REQUEST['auth'] : null; //si esta o no activo
$do_edit = isset($_REQUEST['do_edit']) ? $_REQUEST['do_edit'] : null;
$_uid = isset($_REQUEST['uid']) ? $_REQUEST['uid'] : null; //id del cliente cuando viene de contacto
$_search = isset($_REQUEST['search'])? $_REQUEST['search'] : null;
$_filter = isset($_REQUEST['filter']) ? $_REQUEST['filter'] : null;
$email = isset($_REQUEST['email'])? $_REQUEST['email'] : null;
$_do_save = isset($_REQUEST['do_save'])? $_REQUEST['do_save'] : null;
$_curso_id = isset($_REQUEST['cid'])? $_REQUEST['cid'] : "";
$_insti_id = isset($_REQUEST['iid'])? $_REQUEST['iid'] : "";
$_tipo = isset($_REQUEST['tipo'])? $_REQUEST['tipo'] : "";

switch($_do) {
    case 'search':
    	$smarty->display('usuarios'.DS.'usrlist_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
		if(!$uperms['usuarios_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		$usrs = new Usuarios();
    		$usrs->listAll($_search);
    	}
    break;
    case 'admin_institucion':
    	$smarty->display('usuarios'.DS.'usrlist_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
    	if(!$uperms['usuarios_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		$u = new AdminInstitucion();
    		$u->listAll($_search);
    	}
    	break;
    case 'view_admininstitucion':
    		$smarty->assign('id', $_uid);
    		$smarty->display('usuarios'.DS.'usrlist_menubar.tpl');
    		$smarty->display('end_menubar.tpl');
    		if(!$uperms['usuarios_w']){
    			Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    		} else {
    			if(isset($do_edit) && $do_edit == "do"){
    				$usr = new AdminInstitucion($_uid);
    				if(!$usr->prepare($_uid)){
    					$usr->save();
    				} else {
    					Elfic::cosRedirect('index2.php?com=usuarios&do=admin_instituciones&uid='.$_uid, ERR_USER_EXIST);
    				}
    			} else {
    				$usr = new AdminInstitucion($_uid);
    				$usr->edit();
    	
    			}
    		}
    		break;
    case 'estudiantes':
    	$smarty->display('usuarios'.DS.'estudianteslist_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
    	if(!$uperms['estudiantes_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(!$uperms['superusuario']) $i = AdminInstitucion::getInstitucionId($uid);
    		else $i = $_insti_id;
    		$e = new Estudiantes();
    		$e->listAll($_search, $i, $_curso_id);
    	}
    break;
    case 'docentes':
    	$smarty->display('usuarios'.DS.'docenteslist_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
    	if(!$uperms['docentes_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(!$uperms['superusuario']) $i = AdminInstitucion::getInstitucionId($uid);
    		else $i = $_insti_id;
    		$d = new Docentes();
    		$d->listAll($_search, $i);
    	}
    break;
    case 'new':
		$smarty->assign('id', $_uid);
		$smarty->display('usuarios'.DS.'users_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
		if(!$uperms['usuarios_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(isset($_do_save) && $_do_save == "do"){
    			$usr = new Usuarios();
    			if(!$usr->prepare()){
    				$usr->save('new');
    			} else {
    				Elfic::cosRedirect('index2.php?com=usuarios&do=new', ERR_USER_EXIST);
    			}
    		} else {
    			$usr = new Usuarios();
    			$usr->nuevo();
    		}
    	}
    break;
	case 'view':
		$smarty->assign('id', $_uid);
		$smarty->display('usuarios'.DS.'users_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
		if(!$uperms['usuarios_r']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(isset($do_edit) && $do_edit == "do"){
	    		$usr = new Usuarios($_uid);
	    		if(!$usr->prepare($_uid)){
	    			$usr->save();
	    		}else {
    				Elfic::cosRedirect('index2.php?com=usuarios&do=view&uid='.$_uid, ERR_USER_EXIST);
    			}
	    	} else {
	    		$usr = new Usuarios($_uid);
	    		$usr->edit();
   
    		}
    	}
    break;
    case 'nuevo_estudiante':
    	$smarty->assign('id', $_uid);
    	$smarty->display('usuarios'.DS.'users_estudiantes_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
    	if(!$uperms['estudiantes_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(isset($_do_save) && $_do_save == "do"){
    			$e = new Estudiantes();
    			if(!$e->prepare()){
    				$e->save('new');
    			}else {
    				Elfic::cosRedirect('index2.php?com=usuarios&do=nuevo_estudiante', ERR_USER_EXIST);
    			}
    		} else {
    			$e = new Estudiantes();
    			$e->nuevo('estudiante');
    		}
    	}
    break;
    case 'view_estudiante':
    	$smarty->assign('id', $_uid);
    	$smarty->display('usuarios'.DS.'users_estudiantes_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
    	if(!$uperms['estudiantes_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(isset($do_edit) && $do_edit == "do"){
    			$usr = new Estudiantes($_uid);
    			if(!$usr->prepare($_uid)){
    				$usr->save();
    			}else {
    				Elfic::cosRedirect('index2.php?com=usuarios&do=view_estudiante&uid='.$_uid, ERR_USER_EXIST);
    			}
    		} else {
    			$usr = new Estudiantes($_uid);
    			$usr->edit();
    			 
    		}
    	}
    break;
    case 'nuevo_docente':
    	$smarty->assign('id', $_uid);
    	$smarty->display('usuarios'.DS.'users_docentes_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
    	if(!$uperms['docentes_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(isset($_do_save) && $_do_save == "do"){
    			$e = new Docentes();
    			if(!$e->prepare()){
    				$e->save('new');
    			} else {
    				Elfic::cosRedirect('index2.php?com=usuarios&do=nuevo_docente', ERR_USER_EXIST);
    			}
    		} else {
    			$e = new Docentes();
    			$e->nuevo('docente');
    		}
    	}
    	break;
    case 'view_docente':
    	$smarty->assign('id', $_uid);
    	$smarty->display('usuarios'.DS.'users_docentes_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
    	if(!$uperms['estudiantes_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(isset($do_edit) && $do_edit == "do"){
    			$usr = new Docentes($_uid);
    			if(!$usr->prepare($_uid)){
    				$usr->save();
    			} else {
    				Elfic::cosRedirect('index2.php?com=usuarios&do=view_docente&uid='.$_uid, ERR_USER_EXIST);
    			}
    		} else {
    			$usr = new Docentes($_uid);
    			$usr->edit();
    
    		}
    	}
    	break;
    case 'chpass':
		$smarty->assign('id', $_uid);
		$smarty->display('usuarios'.DS.'users_menubar.tpl');
    	$smarty->display('end_menubar.tpl');
		if(!$uperms['usuarios_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		$usr = new Usuarios($_uid);
    		$usr->chpasswd();
    	}
    break;
    case 'ajax':
    	include 'usuarios.ajax.php';
    break;
    case 'borrar':
    	if(!$uperms['estudiantes_w'] && !$uperms['docentes_w']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_ACC);
    	} else {
    		$u = new Usuarios();
    		$u->borrar($_uid, $_tipo);
    	}
    	break;
}