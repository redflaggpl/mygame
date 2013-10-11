<?php

class Institucion extends Elfic {
	
	/**
	 * Registra institucion en la db
	 * @param array $data
	 * @return boolean
	 */
	public function registrarInstitucion($data)
	{
		$db = new DB();
		if(!$db->perform(TBL_INSTITUCIONES, $data))
		{
			return 0;
		}
		return 1;
	}
	
	/**
	 * Consulta un curso en la DB a partir de su id
	 * @param int $id
	 * @return object
	 */
	public function getInstitucion($id)
	{
		$db = new DB();
		$sql = "SELECT * FROM ".TBL_INSTITUCIONES." WHERE id = $id";
		
		$res = $db->queryUniqueObject($sql);
		if(!$res)
		{
			return 0;
		}
		return $res;
	}
	
	public function nuevo()
	{
		$tpl = new Elfic_Smarty();
		//$tpl->assign('usuarios', Grupos::getUsuariosGrupo(1));
		$tpl->assign('municipios', Elfic::getMunicipiosArray(50));
		$tpl->assign('estados', Elfic::getEstados());
		$tpl->display('instituciones/institucionesNew.tpl');	
	}
	
	public function edit($id)
	{
		$data = $this->getInstitucion($id);
		
		$tpl = new Elfic_Smarty();
		$tpl->assign('iid', $data->id);
		$tpl->assign('nombre', $data->nombre);
		$tpl->assign('usuarios', Grupos::getUsuariosGrupo(1));
		//$tpl->assign('rector_id', $data->rector_id);
		$tpl->assign('municipios', Elfic::getMunicipiosArray(50));
		$tpl->assign('municipios_id', $data->municipios_id);
		$tpl->assign('estados', Elfic::getEstados());
		$tpl->assign('estado', $data->estado);
		$tpl->display('instituciones/institucionesEdit.tpl');
	}
	
	/**
	 * Imprime vista con listado de cursos
	 */
	public function listarInstituciones($filtro)
	{
		$db = new DB();
		$sql = "SELECT i.id, i.nombre, i.municipios_id, i.departamentos_id,  "
		     . "i.borrado, i.fecha_creacion, i.creado_por, i.estado, m.municipio, "
		     . "d.departamento  "
		     . "FROM instituciones i "
		     . "INNER JOIN municipios m  ON i.municipios_id = m.id "
		     . "INNER JOIN departamentos d ON i.departamentos_id = d.id "
		    // . "INNER JOIN usuarios u ON i.rector_id = u.id "
		     . "WHERE i.borrado = 0 ORDER BY i.id DESC ";
		     
		$starting = isset($_GET['starting']) ? $_GET['starting'] : 0;
		
		$pag = new Pagination($sql, $starting, 20, 'index2.php?com=instituciones');		
		$res = $pag->result;
		
		$data = array();
		$x = 0;
		while($line = $pag->fetchNextObject($res)){
			$data[$x]['id'] = $line->id;
			$data[$x]['nombre'] = $line->nombre;
			$data[$x]['municipio'] = $line->municipio;
			//$data[$x]['rector'] = $line->rector;
			$data[$x]['estado'] = Elfic::getIcon($line->estado);
			$x++;
		}
		
		$tpl = new Elfic_Smarty();
		$tpl->assign('data',$data);
		$tpl->assign('anchors',$pag->anchors);
		$tpl->assign('total', $pag->total);
		$tpl->display('instituciones/institucionesList.tpl');
		
	}
	
	/**
	 * Imprime vista de un curso
	 * @param int $id
	 */
	public function visualizarInstitucion($id, $vista = "view")
	{
		$c = $this->getInstitucion($id);
		
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
		if($vista == "view")	{ $tpl->display('instituciones/institucionView.tpl'); }
		else { $tpl->display('cursos/cursoEdit.tpl');}
	}
	
	/**
	 * creo o actualiza un curso en la db. Si id vacio inserta,
	 * de lo contrario actualiza id parametro
	 * @param int $id
	 * @return void
	 */
	public function setInstitucion($id = "")
	{
		global $uid;
		
		$db = new DB();
		$data['nombre'] = strtoupper($_POST['nombre']);
		$data['municipios_id'] = $_POST['municipios_id'];
		$data['departamentos_id'] = $_POST['departamentos_id'];
		//$data['rector_id'] = $_POST['rector_id'];
		$data['borrado'] = 0;
		$data['fecha_creacion'] = Elfic::now();
		$data['creado_por'] = $uid;
		$data['estado'] = $_POST['estado'];
		if($id == "") {
			if($db->perform(TBL_INSTITUCIONES, $data) == false){
				$msg = MSG_INSTITUCION_ERR;
			}
			else {
				$msg = MSG_INSTITUCION_OK;
			}
		}
		else {
			if(!$db->perform(TBL_INSTITUCIONES, $data, 'update', 'id='.$id)){
				$msg = MSG_INSTITUCION_ERR;
			}
			else {
				$msg = MSG_INSTITUCION_OK;
			}
		}
		Elfic::cosRedirect('index2.php?com=instituciones', $msg);
	}
	
	public function getArregloInstituciones()
	{
		
		global $uperms, $uid;
		
		$and = "";
		$isnt = Institucion::getInstitucionUsuario($uid);
		
		if(!$uperms['superusuario'])
		{ 
			$and = "AND id IN(SELECT instituciones_id FROM admin_institucion "
			     . "WHERE usuarios_id = $uid)"; 
		}
		
		$db = new DB();
		$sql = "SELECT * FROM " . TBL_INSTITUCIONES
		     . " WHERE estado = 1 AND borrado = 0 $and ";
		$res = $db->query($sql);
		$data = array();
		while($line = $db->fetchNextObject($res))
		{
			$data[$line->id] = $line->nombre;
		}
		
		return $data;
	}
	
	/**
	 * Cambia estado a borrado 1 de una institucion en la db
	 * @param int $iid intitución id
	 */
	public function borrar($iid)
	{
		$db = new DB();
		$data['borrado'] = 1;
		if(!$db->perform(TBL_INSTITUCIONES, $data, 'update', 'id='.$iid))
		{
			$msg = ERR_INSTITUCION_DEL;
		}
		$msg = MSG_INSTITUCION_DEL;
		Elfic::cosRedirect('index2.php?com=instituciones', $msg);
	}
	
	/**
	 * Retorna id de la institución asociada a un administrador
	 * @param int $id
	 * @return int 
	 */
	public function getInstitucionUsuario($id)
	{
		$db = new DB();
		//$sql = "SELECT id FROM instituciones WHERE rector_id = $id";
		$sql = "SELECT instituciones_id FROM admin_institucion WHERE usuarios_id = $id";
		return $db->queryUniqueValue($sql);
	}
	
	/**
	 * Arreglo de cursos de una institución
	 * @param int $institucion_id
	 * @return array
	 */
	public function getCursosArray($institucion_id)
	{
		$sql = "SELECT id, curso FROM cursos "
		     . "WHERE instituciones_id = $institucion_id "
		     . "AND borrado = 0  AND publicado = 1";
		$db = new DB();
		$res = $db->query($sql);
		$data = array();
		while($line = $db->fetchNextObject($res))
		{
			$data[$line->id] = $line->curso;
		}
		return $data;
	}
	
	/**
	 * Retorna nombre de una institución a partir de su id
	 * @param int $iid
	 * @return String
	 */
	public function getInstitucionNombre($iid)
	{
		$db = new DB();
		$sql = "SELECT nombre FROM instituciones WHERE id = $iid";
		return $db->queryUniqueValue($sql);
	}
	
	/**
	 * Arreglo de docentes asociados a una institución
	 * @param int inti_id id de la institución
	 */
	public function getDocentesArreglo($insti_id)
	{
		$db = new DB();
		$sql = "SELECT p.usuarios_id, CONCAT(u.nombres, ' ',u.apellidos) AS docente "
		     . "FROM profesores p  INNER JOIN usuarios u ON p.usuarios_id = u.id "
		     . "WHERE p.instituciones_id = $insti_id AND u.activo = 1 ";
		$res = $db->query($sql);
		$data = array();
		while($line = $db->fetchNextObject($res))
		{
			$data[$line->usuarios_id] = $line->docente;
		}
		return $data;
	}
	
	public function getDocentesCombo($insti_id)
	{
		$db = new DB();
		$sql = "SELECT p.usuarios_id, CONCAT(u.nombres, ' ',u.apellidos) AS docente "
			. "FROM profesores p  INNER JOIN usuarios u ON p.usuarios_id = u.id "
			. "WHERE p.instituciones_id = $insti_id AND u.activo = 1 ";
		$res = $db->query($sql);
		$data = "";
		$data .= '<select name="profesores_id" id="profesores_id" class="required">'
			   . '	<option value="">--Seleccione--</option>';
		while($line = $db->fetchNextObject($res))
		{
			$data .= '<option value="'.$line->usuarios_id.'">'.$line->docente.'</option>';
		}
		$data .= '</select>';
		echo $data;
	}

}

?>