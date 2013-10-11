<?php

/**
 * @Package: Sistema de Información de Metabastos (SIMBA)
 * @subpackage Reportes - fincas
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.ins.net.co
 * @Date: Enero 14, 2011
 * @source : Reportes_Usuarios_List.php
 * @Version: 1.0
 */

class Reportes_Curso extends Reportes {
	
	private $id;
	
	private $curso;
	
	private $institucion;
	
	private $desafios = array();
	
	function __construct(){
		
	}
	
	
	function getReport($id = "")
	{
		$this->_buildReport($id);
	}
	
	public function listarCursos()
	{
		global $starting, $uperms, $uid;
		
		$sql  = "SELECT c.id, c.curso, c.instituciones_id, g.grado "
			. "FROM cursos c INNER JOIN grados g ON c.grados_id = g.id "
			. "WHERE c.borrado = 0 AND c.publicado = 1 AND profesores_id = $uid "
			. "ORDER BY c.id DESC";
		
		
		$objpag = new Pagination($sql, $starting, 100, 'index2.php?com=reportes&do=listar_cursos');
		$res = $objpag->result;
		
		$d = array();
		$x = 0;
		$line = "";
		while($line = $objpag->fetchNextObject($res)){
			$d[$x]['id'] = $line->id;
			$d[$x]['curso'] = $line->curso;
			$d[$x]['grado'] = $line->grado;
			$x++;
		}
		$tpl = new Elfic_Smarty();
		$tpl->assign('anchors', $objpag->anchors);
		$tpl->assign('total', $objpag->total);
		$tpl->assign('data', $d);
		$tpl->display('reportes'.DS.'reportesCursosList.tpl');
	}
	
	function _buildReport($id)
	{
		$muybajo = 0;
		$bajo = 0;
		$sup = 0;
		$muysup = 0;
		
		$oc = new Curso();
		$c = $oc->getCurso($id);
		$this->id = $c->id;
		$this->curso = $c->curso;
		$this->institucion = Institucion::getInstitucionNombre($c->instituciones_id);
		
		$tpl = new Elfic_Smarty();
		$tpl->assign('estudiantes', $this->getEstudiantesCursoArray());
		
		foreach($this->desafios as $d)
		{
			if($d <= 192) $muybajo++;
			if($d > 192 && $d <= 384) $bajo++;
			if($d > 384 && $d <= 576) $sup++;
			if($d > 576) $muysup++;
		}
		
		//$bajo = 42;
		$datos = array();
		array_push($datos, $muybajo);
		array_push($datos, $bajo);
		array_push($datos, $sup);
		array_push($datos, $muysup);
		/*$restante = 42-$muysup-$bajo-$sup-$muysup;
		array_push($datos, $restante);*/
		$textos = array("Menos de 192","192-384", "384-576", "576-768");
		
		$cd = urlencode(serialize($datos));
		$ct = urlencode(serialize($textos));
		
		$titulo = "% de estudiantes en rangos";
		$torta = "<img src='torta.php?datos=$cd&textos=$ct&titulo=$titulo'>";
		
		
		$tpl->assign('institucion',$this->institucion);
		$tpl->assign('curso',$this->curso);
		$tpl->assign('torta',$torta);
		$tpl->display('reportes'.DS.'reportesCurso.tpl');
	}
	
	public function getEstudiantesCursoArray()
	{
		$sql = "SELECT u.id, CONCAT(u.nombres,  ' ',  u.apellidos) AS estudiante "
		     . "FROM usuarios u INNER JOIN estudiantes e ON u.id = e.usuarios_id "
		     . "WHERE e.cursos_id = $this->id ORDER BY u.apellidos ASC ";
		$db = new DB();
		$res = $db->query($sql);
		$i = 0;
		$data = array();
		while($line = $db->fetchNextObject($res))
		{
			$data[$i]['id'] = $line->id;
			$data[$i]['estudiante'] = $line->estudiante;
			$desafio = Reportes_Estudiante::_getMaximoDesafioAprobado($line->id);
			$data[$i]['desafio'] = $desafio;
			array_push($this->desafios, $desafio);
		}
		return $data;
	}
	
	
	/**
	 * 
	 * @param int $estudiante
	 * @return int
	 */
	private function _getMaximoDesafioAprobado($estudiante)
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