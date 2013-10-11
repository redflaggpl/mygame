<?php
/**
 * @Package: BELLUM (Elfic Framework)
 * @subpackage eChallenge - desafios
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.ins.net.co
 * @Date: Marzo 13, 2012
 * @File: desafios.php
 * @Version: 1.0
 * 
 * Controlador de eventos desafios
 */
defined('_ELFEXEC') or die('Error');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'ComDesafios.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_Choose.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_Answer.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_Match.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_FillIn.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_FromText.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_Organize.php');

$desafioN = $_SESSION['desafioN'];
//numero de subnivel como global
$subnivelN = $_SESSION['subnivelN'];
//numero de nivel como global
$nivelN = $_SESSION['nivelN'];
//numero de intentos fallidos
$intentos = $_SESSION['intentos'];

$msg	= isset($_GET['msg']) ? $msg : '';
$_do = isset($_REQUEST['_do']) ? $_REQUEST['_do'] : 'set';
$_do_save = isset($_REQUEST['do_save']) ? $_REQUEST['do_save'] : null;
$_eid = isset($_REQUEST['eid']) ? $_REQUEST['eid'] : null;
$_pid = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : null;
$_desafio = isset($_REQUEST['desafio']) ? $_REQUEST['desafio'] : $desafioN;
$_subnivel = isset($_REQUEST['subnivel']) ? $_REQUEST['subnivel'] : $subnivelN;
$_nivel = isset($_REQUEST['nivel']) ? $_REQUEST['nivel'] : $nivelN;

switch($_do) {
    case 'get':
    	if(!$uperms['desafios_r']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		if(!$_subnivel)
    		{
    			Elfic::cosRedirect('index2.php', ERR_DESAFIO_REQ);
    		} else 
    		{
    			$d = new ComDesafios();
    			$d->getDesafioRand($_desafio, $_subnivel);
    		}
    		
    	}
    break;
    case 'set':
    	if(!$uperms['desafios_r']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		$d = new ComDesafios();
    		$d->setDesafioRespuesta();
    	}
    break;
    case 'start':
    	if(!$uperms['desafios_r']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		$d = new ComDesafios();
    		$d->start();
    	}
    break;
    case 'continue':
		if(!$uperms['desafios_r']){
    		Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
    	} else {
    		$d = new ComDesafios();
    		$d->setContinue();
    	}
}