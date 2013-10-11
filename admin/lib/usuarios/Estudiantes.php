<?php

class Estudiantes extends Usuarios {
	
	private $_id = null;
	
	private $anchors = null;
	
	private $total = null;
	
	function __construct($id = "")
	{
		parent::__construct($id);
		$this->_id = $id;
	}
	
	public function getEstudiante($id)
	{
		$db = new DB();
		$sql = "SELECT * FROM estudiantes WHERE usuarios_id = $id";
		return $db->queryUniqueObject($sql);
	}
	
	/**
	 * Arreglo de estudiantes, paginada si parametro full=false, consulta completa si full=true
	 * @param String $nombre
	 * @param int $institucion
	 * @param int $curso
	 * @param boolean $full
	 */
	public function getEstudiantesArreglo($nombre, $institucion, $curso, $full = false)
	{
		global $starting;
		
		$and = "";
		
		if($nombre != "") $and .= " AND nombres LIKE '%$nombre%' OR apellidos LIKE '%$nombre%' ";
		if($institucion != "") $and .= "AND e.instituciones_id = $institucion ";
		if($curso != "") $and .= "AND e.cursos_id = $curso ";
		
		$db = new DB();
		$sql  = "SELECT u.id, CONCAT(u.nombres, ' ', u.apellidos) AS estudiante, "
		      . "c.curso,  i.nombre AS institucion "
		      . "FROM usuarios u  INNER JOIN estudiantes e ON e.usuarios_id = u.id "
		      . "INNER JOIN instituciones i ON e.instituciones_id = i.id "
		      . "INNER JOIN cursos c ON e.cursos_id = c.id "
		      . "WHERE u.activo = 1 AND u.id IN "
		      . "(SELECT usuario_id FROM usuarios_grupos_links WHERE usuarios_grupo_id = '3')"
			      .$and
			. " ORDER BY nombres ASC";
		
		/**
		 * Si se require la consulta paginada, de los contrario array completo
		 */
		if(!$full) {
			$objpag = new Pagination($sql, $starting, 20, 'index2.php?com=usuarios&do=estudiantes');
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
			$data[$i]['estudiante'] = $line->estudiante;
			$data[$i]['curso'] = $line->curso;
			$data[$i]['institucion'] = $line->institucion;
			$i++;
		}
		
		return $data;
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Usuarios::listAll()
	 */
	public function listAll($nombre, $institucion, $curso)
	{
		$data = $this->getEstudiantesArreglo($nombre, $institucion, $curso);
		$tpl = new Elfic_Smarty();
		$tpl->assign('u',$data);
		$tpl->assign('anchors',$this->anchors);
		$tpl->assign('total',$this->total);
		$tpl->display('usuarios'.DS.'estudiantesList.tpl');
	}
	
	/**
	 * Imprime form de creación de estudiante
	 */
	public function nuevo()
	{
		global $uid;
	
		$tpl = new Elfic_Smarty();
		$tpl->assign('activo',$this->getEstadosArray());
		/*$iid = AdminInstitucion::getInstitucionId($uid);
		$tpl->assign('institucion_id', $iid);
		$tpl->assign('institucion',Institucion::getInstitucionNombre($iid));*/
		$tpl->assign('instituciones', Institucion::getArregloInstituciones());
		/*$tpl->assign('cursos',Institucion::getCursosArray(AdminInstitucion::getInstitucionId($uid)));*/
		$tpl->display('usuarios'.DS.'estudiantesNew.tpl');
	}
	
	/**
	 * @desc Form de edición de usuario, perfiles, estado
	 */
	public function edit(){
		global $uid;
	
		$tpl = new Elfic_Smarty();
		$data = $this->getUser($this->_id);
		$e = $this->getEstudiante($this->_id);
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
		$tpl->assign('institucion',Institucion::getInstitucionNombre($iid));
		$tpl->assign('cursos',Institucion::getCursosArray(AdminInstitucion::getInstitucionId($uid)));*/
		$tpl->assign('instituciones', Institucion::getArregloInstituciones());
		$tpl->assign('institucion_id', $e->instituciones_id);
		$tpl->assign('cursos',Institucion::getCursosArray($e->instituciones_id));
		$tpl->assign('cursos_id', $e->cursos_id);
		$tpl->display('usuarios'.DS.'estudiantesEdit.tpl');
	}
	
	public function prepare($id = "")
	{
		parent::prepare($id, "view_estudiante");
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
		
		$datae = array();
		$datae['instituciones_id'] = $db->sqlInput($_REQUEST['instituciones_id'], 'int');
		$datae['cursos_id'] = $_REQUEST['cursos_id'];
	
		if($action == "new"){
			$data['creado']= date("Y-n-j"." "."H:i:s");
			$data['password'] = AuthUser::encrypt_password($_REQUEST['password']);
			$db->perform('usuarios', $data);
			$id = $db->lastInsertedId();
			
			$datae['usuarios_id'] = $id;
			$db->perform('estudiantes', $datae);
				
			$g = new Grupos();
			$g->setUsuario($id, 3);
	
		} else {
			if(isset($_REQUEST['password']) && $_REQUEST['password'] != ""){
				$data['password'] 	= AuthUser::encrypt_password($_REQUEST['password']);
			}
			$id	= $db->sqlInput($_REQUEST['uid'], 'int');
			$db->perform('usuarios', $data, 'update', 'id='.$id);
			$db->perform('estudiantes', $datae, 'update', 'usuarios_id='.$id);
		}
		$url = "index2.php?com=usuarios&do=estudiantes";
		Elfic::cosRedirect($url);
	
	
	}
	
	public function getInstitucion($id)
	{
		$db = new DB();
		$sql = "SELECT instituciones_id FROM estudiantes WHERE usuarios_id = $id";
		return $db->queryUniqueValue($sql);
	}
	
	public function getCurso($id)
	{
		$db = new DB();
		$sql = "SELECT c.curso FROM estudiantes e "
		     . "INNER JOIN cursos c ON c.id = e.cursos_id WHERE usuarios_id = $id";
		return $db->queryUniqueValue($sql);
	}

}

?>