<?php

class Docentes extends Usuarios {
	
	private $_id = null;
	
	private $anchors = null;
	
	private $total = null;
	
	function __construct($id = "")
	{
		parent::__construct($id);
		$this->_id = $id;
	}
	
	public function getDocente($id)
	{
		$db = new DB();
		$sql = "SELECT * FROM profesores WHERE usuarios_id = $id";
		return $db->queryUniqueObject($sql);
	}
	
	/**
	 * Arreglo de docentes, paginada si parametro full=false, consulta completa si full=true
	 * @param String $nombre
	 * @param int $institucion
	 * @param int $curso
	 * @param boolean $full
	 */
	public function getDocentesArreglo($nombre, $institucion, $full = false)
	{
		global $starting;
		
		$and = "";
		
		if($nombre != "") $and .= " AND nombres LIKE '%$nombre%' OR apellidos LIKE '%$nombre%' ";
		if($institucion != "") $and .= "AND p.instituciones_id = $institucion ";
		
		$db = new DB();
		$sql  = "SELECT u.id, CONCAT(u.nombres, ' ', u.apellidos) AS docente, "
		      . "i.nombre AS institucion "
		      . "FROM usuarios u  INNER JOIN profesores p ON p.usuarios_id = u.id "
		      . "INNER JOIN instituciones i ON p.instituciones_id = i.id "
		      . "WHERE u.activo = 1 AND u.id IN "
		      . "(SELECT usuario_id FROM usuarios_grupos_links WHERE usuarios_grupo_id = '2') "
			      .$and
			. " ORDER BY nombres ASC";
		
		/**
		 * Si se require la consulta paginada, de los contrario array completo
		 */
		if(!$full) {
			$objpag = new Pagination($sql, $starting, 20, 'index2.php?com=usuarios&do=docentes');
			$res = $objpag->result;
			$this->anchors = $objpag->anchors;
			$this->total = $objpag->total;
		} else {
			$res = $db->query($sql);
		}
		
		
		$data = array();
		$i = 0;
		while($line = $objpag->fetchNextObject($res)){
			$data[$i]['id'] = $line->id;
			$data[$i]['docente'] = $line->docente;
			$data[$i]['institucion'] = $line->institucion;
			$i++;
		}
		
		return $data;
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Usuarios::listAll()
	 */
	public function listAll($nombre, $institucion)
	{
		$data = $this->getDocentesArreglo($nombre, $institucion);
		$tpl = new Elfic_Smarty();
		$tpl->assign('u',$data);
		$tpl->assign('anchors',$this->anchors);
		$tpl->assign('total',$this->total);
		$tpl->display('usuarios'.DS.'docentesList.tpl');
	}
	
	/**
	 * Imprime form de creación de estudiante
	 */
	public function nuevo()
	{
		global $uid;
	
		$tpl = new Elfic_Smarty();
		$tpl->assign('activo',$this->getEstadosArray());
		$tpl->assign('instituciones', Institucion::getArregloInstituciones());
		/*$iid = AdminInstitucion::getInstitucionId($uid);
		$tpl->assign('institucion_id', $iid);
		$tpl->assign('institucion',Institucion::getInstitucionNombre($iid));*/
		$tpl->display('usuarios'.DS.'docentesNew.tpl');
	}
	
	/**
	 * @desc Form de edición de usuario, perfiles, estado
	 */
	public function edit(){
		global $uid;
	
		$tpl = new Elfic_Smarty();
		$data = $this->getUser($this->_id);
		$e = $this->getDocente($this->_id);
		$tpl->assign('uid',$this->_id);
		$tpl->assign('nombres',$data->nombres);
		$tpl->assign('apellidos',$data->apellidos);
		$tpl->assign('login',$data->login);
		$tpl->assign('email',$data->email);
		$tpl->assign('creado', $data->creado);
		$tpl->assign('modificado',$data->modificado);
		$tpl->assign('ultimoingreso',$data->ultimoingreso);
		$tpl->assign("estados_combo", $this->getEstadosArray());
		$tpl->assign('activo',$data->activo);
		/*$iid = AdminInstitucion::getInstitucionId($uid);
		$tpl->assign('institucion_id', $iid);
		$tpl->assign('institucion',Institucion::getInstitucionNombre($iid));*/
		$tpl->assign('instituciones', Institucion::getArregloInstituciones());
		$tpl->assign('institucion_id', $e->instituciones_id);
		$tpl->assign('cursos', $this->getCursosDocente());
		$tpl->display('usuarios'.DS.'docentesEdit.tpl');
	}
	
	public function prepare($id = "")
	{
		return parent::prepare($id, "view_docente");
	}
	
	/**
	 * @desc Registra datos básicos de un Usuario. Insert o Update
	 * @param string $cerrar
	 * @return int $id
	 */
	public function save($action=null)
	{
		global $uid;
	
		$db = new DB();
		$data = array();
		$data['nombres'] = strtoupper($db->sqlInput($_REQUEST['nombres'], 'string'));
		$data['apellidos'] = strtoupper($db->sqlInput($_REQUEST['apellidos'], 'string'));
		$data['login'] = $db->sqlInput($_REQUEST['login'], 'string');
		$data['email'] = $db->sqlInput($_REQUEST['email'], 'string');
		$data['modificado'] = date("Y-n-j"." "."H:i:s");
		$data['activo'] = $db->sqlInput($_REQUEST['activo'], 'string');
		$data['esadmin'] = 'n';
		
		$datad = array();
		$datad['instituciones_id'] = $db->sqlInput($_REQUEST['instituciones_id'], 'int');
			
	
		if($action == "new"){
			$data['creado']= date("Y-n-j"." "."H:i:s");
			$data['password'] = AuthUser::encrypt_password($_REQUEST['password']);
			$db->perform('usuarios', $data);
			$id = $db->lastInsertedId();
			
			$datad['usuarios_id'] = $id;
			$db->perform('profesores', $datad);
				
			$g = new Grupos();
			$g->setUsuario($id, 2);
	
		} else {
			if(isset($_REQUEST['password']) && $_REQUEST['password'] != ""){
				$data['password'] 	= AuthUser::encrypt_password($_REQUEST['password']);
			}
			$id	= $db->sqlInput($_REQUEST['uid'], 'int');
			$db->perform('usuarios', $data, 'update', 'id='.$id);
			$db->perform('profesores', $datad, 'update', 'usuarios_id='.$id);
		}
		$url = "index2.php?com=usuarios&do=docentes";
		Elfic::cosRedirect($url);
	}
	
	public function getCursosDocente()
	{
		$db = new DB();
		$sql = "SELECT id, curso FROM cursos WHERE profesores_id = $this->_id ";
		$res = $db->query($sql);
		$data = array();
		$i = 0;
		while($line = $db->fetchNextObject($res))
		{
			$data[$i]['id'] = $line->id;
			$data[$i]['curso'] = $line->curso;
			$i++;
		}
		return $data;
	}

}

?>