<?php

class AdminInstitucion extends Usuarios {
	
	private $anchors = null;
	
	private $total = null;
	
	private $_id = null;
	
	private $tipo = "view_admininstitucion";
	
	function __construct($id = "")
	{
		parent::__construct($id);
		
		$this->_id = $id;
	}
	
	public function getAdministrador($id)
	{
		$db = new DB();
		$sql = "SELECT * FROM admin_institucion WHERE usuarios_id = $id";
		return $db->queryUniqueObject($sql);
	}
	
	/**
	 * Arreglo de estudiantes, paginada si parametro full=false, consulta completa si full=true
	 * @param String $nombre
	 * @param int $institucion
	 * @param int $curso
	 * @param boolean $full
	 */
	public function getAdministradoresArreglo($nombre, $institucion = "")
	{
		global $starting;
		
		$and = "";
		
		if($nombre != "") $and .= " AND u.nombres LIKE '%$nombre%' OR u.apellidos LIKE '%$nombre%' ";
		if($institucion != "") $and .= "AND i.id = $institucion ";
		
		$db = new DB();
		$sql  = "SELECT u.id, CONCAT(u.nombres, ' ', u.apellidos) AS usuario, "
		      . "i.nombre AS institucion "
		      . "FROM usuarios u INNER  JOIN admin_institucion a ON a.usuarios_id = u.id "
		      . "INNER JOIN instituciones i ON a.instituciones_id = i.id "
		      . "WHERE u.activo = 1 AND u.id IN "
		      . "(SELECT usuario_id FROM usuarios_grupos_links WHERE usuarios_grupo_id = '1') "
			      .$and
			. " ORDER BY u.nombres ASC";
		
		
			$objpag = new Pagination($sql, $starting, 20, 'index2.php?com=usuarios&do=estudiantes');
			$res = $objpag->result;
			$this->anchors = $objpag->anchors;
			$this->total = $objpag->total;
		
		
		$data = array();
		$i = 0;
		while($line = $objpag->fetchNextObject($res)){
			$data[$i]['id'] = $line->id;
			$data[$i]['usuario'] = $line->usuario;
			$data[$i]['institucion'] = $line->institucion;
			$i++;
		}
		
		return $data;
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Usuarios::listAll()
	 */
	public function listAll($nombre = "", $institucion = "")
	{
		$data = $this->getAdministradoresArreglo($nombre, $institucion);
		$tpl = new Elfic_Smarty();
		$tpl->assign('u',$data);
		$tpl->assign('anchors',$this->anchors);
		$tpl->assign('total',$this->total);
		$tpl->display('usuarios'.DS.'adminInstitucionesList.tpl');
	}
	
	/**
	 * Retorna id de institución de un usuario administrador de institucion
	 * @param int $id
	 * @return int
	 */
	public function getInstitucionId($id)
	{
		$db = new DB();
		$sql = "SELECT instituciones_id FROM admin_institucion WHERE usuarios_id = $id";
		return $db->queryUniqueValue($sql);
	}
	
	public function esAdminInstitucion($id)
	{
		$db = new DB();
		$where = "usuario_id = $id AND usuarios_grupo_id = '1'";
		if($db->countOf('usuarios_grupos_links', $where) > 0) return true;
		else return false;
	}
	
	public function edit(){
		global $uid;
	
		$tpl = new Elfic_Smarty();
		$data = $this->getUser($this->_id);
		$a = $this->getAdministrador($this->_id);
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
		$tpl->assign('institucion_id', $a->instituciones_id);
		$tpl->display('usuarios'.DS.'admininstitucionesEdit.tpl');
	}
	
	public function prepare($id = "")
	{
		parent::prepare($id, "view_admininstitucion");
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
			$db->perform('admin_institucion', $datad);
	
			$g = new Grupos();
			$g->setUsuario($id, 1);
	
		} else {
			if(isset($_REQUEST['password']) && $_REQUEST['password'] != ""){
				$data['password'] 	= AuthUser::encrypt_password($_REQUEST['password']);
			}
			$id	= $db->sqlInput($_REQUEST['uid'], 'int');
			$db->perform('usuarios', $data, 'update', 'id='.$id);
			$db->perform('admin_institucion', $datad, 'update', 'usuarios_id='.$id);
		}
		$url = "index2.php?com=usuarios&do=admin_institucion";
		Elfic::cosRedirect($url);
	}
	

}

?>