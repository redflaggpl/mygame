<?php

/** 
 * @author redflag
 * 
 * 
 */
class Home extends Elfic {
	
	function __construct() {
		$this->getHome();
	}
	
	public function getHome()
	{
		//$this->_creaModulo('Encuestas', $this->encuestasRecientes(), 'Encuestas Recientes', 'encuestas');
		//$this->_creaModulo('Eventos', $this->eventosHoy(), 'Eventos para hoy', 'agenda&do=day');
	}
	
	private function _creaModulo($nombre, $data, $mensaje='', $link='')
	{
		$tpl = new Elfic_Smarty();
		$tpl->assign('nombre', $nombre);
		$tpl->assign('data', $data);
		$tpl->assign('mensaje', $mensaje);
		$tpl->assign('link', $link);
		$tpl->display('home/modulo.tpl');
	}
	
	public function encuestasRecientes()
	{
		
	}
	
	public function getEncuestas()
	{
		
	}
	
    public function eventosHoy()
	{
		global $uid;
		
		$hoy = Utils::nowDate();
		$where = "DATE(fechaini) <= '$hoy' AND DATE(fechafin) >= '$hoy' AND funcionario_id = $uid";
		$db = new DB();
		return $db->countOf('eventos', $where);
	}
}
