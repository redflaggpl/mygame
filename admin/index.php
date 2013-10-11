<?php
/**
 * @Package: eChallenge
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> INS Ltda.
 * @Date: Marzo 2, 2012
 * @File: index.php
 * @Version: 1.0
 */
define('APP_PATH', dirname(__FILE__) );

define( 'DS', '/' );
include_once ('includes'.DS.'elfic.ini.php');

$smarty = new Elfic_Smarty();

$auth = new AuthUser();

$msg	= isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
// set the current action and do
$_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';
$_task = isset($_REQUEST['task']) ? $_REQUEST['task'] : '';
$login = isset($_REQUEST['login']) ? $_REQUEST['login'] : false;
$passwd = isset($_REQUEST['passwd']) ? $_REQUEST['passwd'] : false;
$action = isset($_REQUEST['login']) ? $_REQUEST['login'] : false;

$token = isset($_REQUEST['token']) ? $_REQUEST['token'] : false;
$ueml = isset($_REQUEST['ueml']) ? $_REQUEST['ueml'] : false;
$front = isset($_REQUEST['front']) ? $_REQUEST['front'] : 0;

if(!$auth->isLoggedIn()) {
	$auth->login($login, $passwd);
}

$utils = new Utils();

switch($_action) {
    case 'submit':
	if($auth->isLoggedIn()) {
		$utils->cosRedirect('index2.php');
	} else {
	    $utils->cosRedirect('index.php', NO_LOGIN);
	}
	break;
    case 'login':
    	if($auth->isLoggedIn()) {
    		$utils->cosRedirect('index2.php');
    	} else {
	    	$smarty->assign('msg',$msg);
	    	$smarty->display('loginForm.tpl');
	   	}
	break;
	case 'logout':
    	$auth->logout();
    	$msg = "Sesión cerrada.";
	    $smarty->assign('msg',$msg);
	    $smarty->display('loginForm.tpl');
	break;
	case 'recordar':
		$smarty->assign('msg', $msg);
		$smarty->assign('front', $front);
		$smarty->display('password/recoveryForm.tpl');
	break;
	case 'cambiar':
		
		if(!$ueml) {
			Elfic::cosRedirect('index.php?task=recordar', 'Debe suministrar su email');
		} else {
			$p = new Password();
			$p->reminder($ueml, $front);
		}
	break;
	case 'update':
		if(!$token){
			echo "Error. Haga click en el enlace que recibi&oacute; en el correo";
		} else {
			$p = new Password();
			if($p->chk_token($token)){
				$tpl = new Elfic_Smarty();
				$tpl->assign('email', $ueml);
				$tpl->assign('token', $token);
				$tpl->assign('front', $front);
				$tpl->display('password/changeForm.tpl');
			} else {
				echo "El codigo no existe o ha expirado. Solicite de nuevo su contrase&ntilde;a.";
			}
		}
	break;
	case 'actualiza':
		$p = new Password();
		$p->actualiza($ueml, $token, $passwd, $front);
	break;
}