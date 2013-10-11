<?php
/**
 * @Package: ECHALLENGE
 * @subpackage Reportes
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.ins.net.co
 * @Date: Mayo 23, 2012
 * @filesource: reportes.php
 * @Version: 1.0
 */

$smarty = new Elfic_Smarty();
$msg	= isset($_GET['msg']) ? $msg : '';

$_do = isset($_REQUEST['do']) ? $_REQUEST['do'] : 'resumen';
$_search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
$_eid = isset($_REQUEST['eid']) ? $_REQUEST['eid'] : '';
$_cid = isset($_REQUEST['cursos_id']) ? $_REQUEST['cursos_id'] : '';
$_cursos_id = isset($_REQUEST['cursos_id']) ? $_REQUEST['cursos_id'] : '';

switch($_do) {
	case 'resumen':
		$smarty->display('start_menubar.tpl');
		$smarty->display('reportes'.DS.'reportes_menubar.tpl');
		$smarty->display('end_menubar.tpl');
		if(!$uperms['reportes']){
			Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
		} else {
			$r = new Reportes();
			$r->resumen();
		}
		break;
	case 'listar_estudiantes':
		$smarty->display('start_menubar.tpl');
		$smarty->display('reportes'.DS.'reportes_menubar.tpl');
		$smarty->display('end_menubar.tpl');
		if(!$uperms['reportes']){
			Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
		} else {
			$r = new Reportes_Estudiante();
			$r->listarEstudiantes($_cid, $_search);
		}
	break;
	case 'estudiante':
		$smarty->display('start_menubar.tpl');
		$smarty->display('reportes'.DS.'reportes_menubar.tpl');
		$smarty->display('end_menubar.tpl');
		if(!$uperms['reportes']){
			Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
		} else {
			$r = new Reportes_Estudiante();
			$r->getReport($_eid);
		}
	break;
	case 'listar_cursos':
		$smarty->display('start_menubar.tpl');
		$smarty->display('reportes'.DS.'reportes_menubar.tpl');
		$smarty->display('end_menubar.tpl');
		if(!$uperms['reportes']){
			Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
		} else {
			$r = new Reportes_Curso();
			$r->listarCursos();
		}
	break;
	case 'curso':
			$smarty->display('start_menubar.tpl');
			$smarty->display('reportes'.DS.'reportes_menubar.tpl');
			$smarty->display('end_menubar.tpl');
			if(!$uperms['reportes']){
				Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
			} else {
				$r = new Reportes_Curso();
				$r->getReport($_cid);
			}
			break;
	case 'listtoexcel':
		$smarty->display('start_menubar.tpl');
		$smarty->display('reportes_menubar.tpl');
		$smarty->display('end_menubar.tpl');
		if(!$uperms['reportes']){
			Elfic::cosRedirect('index2.php', MSG_NOPERM_COM);
		} else {
			$r = new Reportes_Asistencia();
			$r->export();
		}
		Elfic::cosRedirect('index2.php?com=reportes');
		break;
}