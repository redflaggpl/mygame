<?php

class Curso extends Elfic {
	
	public function nuevo()
	{
		$tpl = new Elfic_Smarty();
		$tpl->assign('instituciones', Institucion::getArregloInstituciones());
		$tpl->assign('grados', $this->getGrados());
		/*$tpl->assign('docentes', Grupos::getUsuariosGrupo(2));*/
		$tpl->assign('estados', Elfic::getEstados());
		$tpl->display('cursos'.DS.'cursosNew.tpl');	
	}
	
	public function edit($id)
	{
		$data = $this->getCurso($id);
		
		$tpl = new Elfic_Smarty();
		$tpl->assign('cid', $data->id);
		$tpl->assign('curso', $data->curso);
		$tpl->assign('grados', $this->getGrados());
		$tpl->assign('grados_id', $data->grados_id);
		$tpl->assign('instituciones', Institucion::getArregloInstituciones());
		$tpl->assign('instituciones_id', $data->instituciones_id);
		$tpl->assign('docentes',  Institucion::getDocentesArreglo($data->instituciones_id));
		$tpl->assign('profesores_id', $data->profesores_id);
		$tpl->assign('estados', Elfic::getEstados());
		$tpl->assign('estado', $data->publicado);
		$tpl->display('cursos'.DS.'cursosEdit.tpl');
	}
	
	
	/**
	 * Consulta un curso en la DB a partir de su id
	 * @param int $id
	 * @return object
	 */
	public function getCurso($id)
	{
		$db = new DB();
		$sql = "SELECT * FROM cursos WHERE id = $id";
		$res = $db->queryUniqueObject($sql);
		
		if(!$res)
		{
			return 0;
		}
		return $res;
	}
	
	/**
	 * Imprime vista con listado de cursos
	 */
	public function listarCursos($filtro)
	{
		global $uperms, $auth, $uid;
		$and = "";
		$inst = Institucion::getInstitucionUsuario($uid);
		if(!$uperms['superusuario'])
		{
			$and = " AND instituciones_id = $inst";
		}
		
		$db = new DB();
		$sql = "SELECT c.id, c.curso, c.grados_id, c.instituciones_id, c.profesores_id, "
		     . "c.publicado, c.comentarios, i.nombre AS institucion, "
		     . "CONCAT(u.nombres,' ', u.apellidos) AS profesor "
		     . "FROM cursos c INNER JOIN instituciones i  ON c.instituciones_id = i.id "
		     . "INNER JOIN usuarios u ON c.profesores_id = u.id "
		     . "WHERE c.borrado = 0 $and "
		     . "ORDER BY c.id DESC ";
		     
		$starting = isset($_GET['starting']) ? $_GET['starting'] : 0;
		
		$pag = new Pagination($sql, $starting, 20, 'index2.php?com=cursos&do=list');		
		$res = $pag->result;
		
		$data = array();
		$x = 0;
		while($line = $pag->fetchNextObject($res)){
			$data[$x]['id'] = $line->id;
			$data[$x]['curso'] = $line->curso;
			$data[$x]['grados_id'] = $line->grados_id;
			$data[$x]['instituciones_id'] = $line->instituciones_id;
			$data[$x]['institucion'] = $line->institucion;
			$data[$x]['profesores_id'] = $line->profesores_id;
			$data[$x]['docente'] = $line->profesor;
			$data[$x]['estado'] = Elfic::getIcon($line->publicado);
			$x++;
		}
		$tpl = new Elfic_Smarty();
		$tpl->assign('data',$data);
		$tpl->assign('anchors',$pag->anchors);
		$tpl->assign('total', $pag->total);
		$tpl->display('cursos/cursosList.tpl');
		
	}
	
	/**
	 * Imprime vista de un curso
	 * @param int $id
	 */
	public function visualizarCurso($id, $vista = "view")
	{
		$c = $this->getCurso($id);
		
		$tpl = new Elfic_Smarty();
		$tpl->assign('id', $c->id);
		$tpl->assign('curso', $c->curso);
		$tpl->assign('grados_id', $c->grados_id);
		$tpl->assign('instituciones_id', $c->instituciones_id);
		$tpl->assign('profesores_id', $c->profesores_id);
		$tpl->assign('creador_por', $c->creado_por);
		$tpl->assign('fecha_creacion', $c->fecha_creacion);
		$tpl->assign('publicado', $c->publicado);
		$tpl->assign('borrado', $c->borrado);
		$tpl->assign('comentarios', $c->comentarios);
		if($vista == "view")	{ $tpl->display('cursos/cursoView.tpl'); }
		else { $tpl->display('cursos/cursoEdit.tpl');}
	}
	
	/**
	 * creo o actualiza un curso en la db. Si id vacio inserta,
	 * de lo contrario actualiza id parametro
	 * @param int $id
	 * @return void
	 */
	public function setCurso($id = "")
	{
		global $uid;
		
		$db = new DB();
		$data['curso'] = strtoupper($_POST['curso']);
		$data['grados_id'] = $_POST['grados_id'];
		$data['instituciones_id'] = $_POST['instituciones_id'];
		$data['profesores_id'] = $_POST['profesores_id'];
		$data['creado_por'] = $uid;
		$data['fecha_creacion'] = Elfic::now();
		$data['publicado'] = $_POST['publicado'];
		$data['borrado'] = 0;
		$data['comentarios'] = $_POST['comentarios'];
		
		if($id == "") {
			if($db->perform(TBL_CURSOS, $data) == false){
				$msg = MSG_CURSOS_ERR;
			}
			else {
				$msg = MSG_CURSOS_OK;
			}
		}
		else {
			if(!$db->perform(TBL_CURSOS, $data, 'update', 'id='.$id)){
				$msg = MSG_CURSOS_ERR;
			}
			else {
				$msg = MSG_CURSOS_UPDATE_OK;
			}
		}
		Elfic::cosRedirect('index2.php?com=cursos', $msg);
	}
	
	public function getGrados()
	{
		$db = new DB();
		$sql = "SELECT * FROM grados ORDER BY grado ASC";
		$res = $db->query($sql);
		$data = array();
		while($line = $db->fetchNextObject($res))
		{
			$data[$line->grado] = $line->nombre;
		}
		return $data;
	}
	
	public function borrar($cid)
	{
		$db = new DB();
		$sql = "UPDATE cursos SET borrado = 1 WHERE id = $cid";
		$db->execute($sql);
	}

}

?>