<?php

/**
 * @Package: Sistema de Información de Metabastos (SIMBA)
 * @subpackage Reportes - fincas
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.ins.net.co
 * @Date: Enero 14, 2011
 * @source : Reportes_Usuarios_List.php
 * @Version: 1.0
 */

class Reportes_Estudiante extends Reportes {
	
	private $curso;
	private $institucion;
	private $estudiante;
	
	
	function __construct(){
		
	}
	
	
	function getReport($id = "")
	{
		/*$tpl = new Elfic_Smarty();
		$tpl->assign('u',);
		$tpl->assign('anchors',$this->anchors);
		$tpl->assign('total',$this->total);
		//$tpl->display('reportesUsuariosList.tpl');
		$tpl->display('reportesEstudiante.tpl');*/
		$this->_buildReport($id);
	}
	
	public function listarEstudiantes($curso = "", $filtro)
	{
		global $starting, $uperms, $uid;
		
		$and = "";
		
		if($curso != ""){
			$and .= "AND e.cursos_id = $curso ";
		}
		
		if($filtro != ""){
			$and .= "AND CONCAT(u.nombres, ' ', u.apellidos) LIKE '%$filtro%' ";
		}
		
		$sql  = "SELECT u.id, CONCAT(u.nombres, ' ', u.apellidos) AS estudiante, u.login, "
			. "e.cursos_id, c.curso "
			. "FROM usuarios u INNER JOIN estudiantes e ON u.id = e.usuarios_id "
			. "INNER JOIN cursos c ON e.cursos_id = c.id "
			. "WHERE u.activo = 1 "
			. "AND e.cursos_id IN (SELECT id FROM cursos WHERE profesores_id = $uid) "
			. $and
			. " ORDER BY u.id DESC";
		
		
		$objpag = new Pagination($sql, $starting, 100, 'index2.php?com=reportes&do=listar_estudiantes');
		$res = $objpag->result;
		
		$d = array();
		$x = 0;
		$line = "";
		while($line = $objpag->fetchNextObject($res)){
			$d[$x]['id'] = $line->id;
			$d[$x]['estudiante'] = $line->estudiante;
			$d[$x]['login'] = $line->login;
			$d[$x]['curso'] = $line->curso;
			$x++;
		}
		$tpl = new Elfic_Smarty();
		$tpl->assign('cursos', $this->getCursosDocenteComboArray($uid));
		$tpl->assign('anchors', $objpag->anchors);
		$tpl->assign('total', $objpag->total);
		$tpl->assign('data', $d);
		$tpl->display('reportes'.DS.'reportesEstudiantesList.tpl');
	}
	
	function _buildReport($id)
	{
		$oe = new Estudiantes();
		$u = $oe->getUser($id);
		$e = $oe->getEstudiante($id);
		
		$this->curso = Estudiantes::getCurso($id);
		$this->institucion = Institucion::getInstitucionNombre($e->instituciones_id);
		$this->estudiante = $u->nombres . ' ' .$u->apellidos;
		/* Maximo desafio aprobado en todos los juegos */
		$md = $this->_getMaximoDesafioAprobado($id);
		/* máximo desafio aprobado último juego */
		$umd = $this->_getDesafioUltimoJuego($id);
		
		$nivel = $this->_getNivel($id);
		$subnivel = $this->_getMaximoSubnivel($id);
		
		
		$datos = array();
		array_push($datos, $md);
		array_push($datos, 768-$md);
		$textos = array("Superado","Pendiente");
		
		$cd = urlencode(serialize($datos));
		$ct = urlencode(serialize($textos));
		
		$torta = "<img src='torta.php?datos=$cd&textos=$ct&titulo=$this->estudiante'>";
		
		$tpl = new Elfic_Smarty();
		$tpl->assign('estudiante', $this->estudiante);
		$tpl->assign('institucion',$this->institucion);
		$tpl->assign('curso',$this->curso);
		$tpl->assign('md',$md);
		$tpl->assign('umd',$umd);
		$tpl->assign('nivel',$nivel);
		$tpl->assign('subnivel',$subnivel);
		$tpl->assign('torta',$torta);
		$tpl->display('reportes'.DS.'reportesEstudiante.tpl');
	}
	
	/**
	 * 
	 * @param int $estudiante
	 * @return int
	 */
	public function _getMaximoDesafioAprobado($estudiante)
	{
		$db = new DB();
		$where = "estudiantes_id=$estudiante AND estado_desafio = 1";
		return $db->maxOf('desafios_id', 'estudiantes_desafios', $where);
	}
	
	private function _getDesafioUltimoJuego($estudiante)
	{
		$db = new DB();
		$sql = "SELECT desafios_id FROM estudiantes_desafios "
		     . "WHERE estudiantes_id = $estudiante AND estado_desafio = 1 "
		     . "ORDER BY id DESC ";
		return $db->queryUniqueValue($sql);
	}
	
	private function _getSubnivel($estudiante)
	{
		$db = new DB();
		$sql = "SELECT subniveles_id FROM estudiantes_desafios "
		. "WHERE estudiantes_id = $estudiante AND estado_desafio = 1 "
		. "ORDER BY id DESC ";
		return $db->queryUniqueValue($sql);
	}
	
	private function _getNivel($estudiante)
	{
		if($this->_getSubnivel($estudiante) > 8){
			return 2;
		}
		return 1;
	}
	
	private function _getMaximoSubnivel($estudiante)
	{
		$db = new DB();
		$where = "estudiantes_id=$estudiante AND estado_desafio = 1";
		return $db->maxOf('subniveles_id', 'estudiantes_desafios', $where);
	}
	
	private function _getNumeroJuegos($estudiante)
	{
		$db = new DB();
		$where = "estudiantes_id=$estudiante AND desafios_id = 1";
		return $db->countOf('estudiantes_desafios', $where);
	}
	
	public function getCursosDocenteComboArray($docente)
	{
		$db = new DB();
		$sql = "SELECT id, curso FROM cursos WHERE profesores_id = $docente ";
		$res = $db->query($sql);
		$data = array();
		$i = 0;
		while($line = $db->fetchNextObject($res))
		{
			$data[$line->id] = $line->curso;
		}
		return $data;
	}
	
	function export()
	{
		$r = $this->_buildReport('', 1);
		$this->createExcel("total_usuarios.xls", $r);
	}
}