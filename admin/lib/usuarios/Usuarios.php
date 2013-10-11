<?php
/**
 * @package Elfic
 * @subpackage Elfic usuarios
 * @Author edison <edison [DOT] galindo [AT] gmail [DOT] com>
 * @Date: Noviembre de 2010
 * @File: Usuarios.php
 * @Version: 1.0
 * 
 * Esta clase define las propiedades y metodos de un Usuario
 */
include_once (APP_PATH.DS.'lib'.DS.'usuarios'.DS.'Grupos.php');

class Usuarios extends Elfic {
	
	/**
     * Id del usuario.
     *
     * @var string
     */
	private $_id;
	
	private $tipo = "";
	
	
	/**
     * Si envia id al constructor inicializa usuario.
     *
     * @param int $id
     */
	function __construct($id = ''){
		if($id != ''){
			$this->_id = $id;
		}
	}
	
	/**
	 * @desc retorna objeto con datos básicos de usuario
	 * @param $id id del usuario
	 * @return object (array)
	 */
	function getUser($id){
		$db = new DB();
		$sql  = "SELECT * FROM usuarios WHERE id = '$id'";
		return $db->queryUniqueObject($sql);
	}
	
	/**
	 * @desc Construye listado de usuarios e imprime template
	 * @param void
	 * @return void (imprime plantilla)
	 */
	function listAll($search="", $grupo = "", $nombre_tipo = "Usuarios"){
		
		$and = "";

		if($search != ""){
			$and .= " AND nombres LIKE '%$search%' OR apellidos LIKE '%$search%' OR login LIKE '%$search%' ";
		}
		
		if($grupo != "")
		{
			$and .= " AND id IN (SELECT usuario_id 
			            FROM usuarios_grupos_links WHERE usuarios_grupo_id = '$grupo') ";
		}
		
		$db = new DB();
		$sql  = "SELECT * FROM usuarios "
		      . "WHERE activo = 1 ".$and
		      . " ORDER BY nombres ASC";
		
		
		if(isset($_GET['starting'])){
			$starting=$_GET['starting'];
		}else{
			$starting=0;
		}
		
		$objpag = new Pagination($sql, $starting, 20, 'index2.php?com=usuarios&do=search');		
		$res = $objpag->result;
		
		$data = array();
		$i = 0;
		while($line = $objpag->fetchNextObject($res)){
			$data[$i]['id'] = $line->id;
			$data[$i]['nombres'] = $line->nombres;
			$data[$i]['apellidos'] = $line->apellidos;
			$data[$i]['login'] = $line->login;
			$data[$i]['email'] = $line->email;
			$data[$i]['creado'] = $line->creado;
			$data[$i]['modificado'] = $line->modificado;
			$data[$i]['ultimoingreso'] = $line->ultimoingreso;
			$data[$i]['activo'] = $this->getIcon($line->activo);
			$data[$i]['esadmin'] = $this->getIcon($line->esadmin);
			$i++;
		}
		$anchors = $objpag->anchors;
		$total = $objpag->total;
		$tpl = new Elfic_Smarty();
		//$tpl->assign('perfil',Perfiles::getPerfiles());
		$tpl->assign('tipo',$nombre_tipo);
		$tpl->assign('u',$data);
		$tpl->assign('anchors',$anchors);
		$tpl->assign('total',$total);
		$tpl->display('usuarios/usuariosList.tpl');
	}
	
    /**
	 * Imprime form de creación de usuario
	 */
	public function nuevo(){
		global $uid;
		
		$tpl = new Elfic_Smarty();
		$tpl->assign('activo',$this->getEstadosArray());
		//$tpl->assign('esadmin',$this->getEstadosArray());
		$tpl->assign('roles', $this->_getRoles());
	    $tpl->display('usuarios'.DS.'usuariosNew.tpl');
	}
	
	/**
	 * @desc Form de edición de usuario, perfiles, estado
	 */
	public function edit(){
		global $uid;
		
		$tpl = new Elfic_Smarty();
		$data = $this->getUser($this->_id);
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
		$tpl->assign('esadmin',$data->esadmin);
		$g = new Grupos();
		$tpl->assign('grupos',$g->chkUserGroup($this->_id));
		$tpl->display('usuarios/usuarioEdit.tpl');
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
		if(isset($_REQUEST['rol']) && $_REQUEST['rol'] == '-1') 
		{
			$data['esadmin'] = '1';
		} else {
			$data['esadmin'] = '0';
		}
		
		if($action == "new"){
			$data['creado']= date("Y-n-j"." "."H:i:s");
			$data['password'] = AuthUser::encrypt_password($_REQUEST['password']);
			$db->perform('usuarios', $data);
			$id = $db->lastInsertedId();
			
			$g = new Grupos();
			$g->setUsuario($id, $_REQUEST['rol']);
			
			if($_REQUEST['rol'] == '1')
			{
				$datai['usuarios_id'] = $id;
				$datai['instituciones_id'] = $_REQUEST['instituciones_id'];
				$db->perform('admin_institucion', $datai);
			}
				
		} else {
			if(isset($_REQUEST['password']) && $_REQUEST['password'] != ""){
				$data['password'] 	= AuthUser::encrypt_password($_REQUEST['password']);
			}
			$data['esadmin'] = $db->sqlInput($_REQUEST['esadmin'], 'int');
			$id	= $db->sqlInput($_REQUEST['uid'], 'int');
			$db->perform('usuarios', $data, 'update', 'id='.$id);
		}
		$url = "index2.php?com=usuarios&do=view&uid=".$id;
		Elfic::cosRedirect($url);
		
		
	}
	
	/**
	 * cambia contraseña
	 */
	
	function chpasswd(){
		$id = $_REQUEST['uid'];
		$cleanpasswd = $_REQUEST['password'];
		$passwdenc = AuthUser::encrypt_password($cleanpasswd);
		$db = new DB();
		$sql  = "UPDATE " . TBL_USUARIOS . " SET password = '$passwdenc' ";
		$sql .= "WHERE id = '$id'";
		$db->execute($sql);
		$url = "index2.php?com=usuarios&do=view&uid=".$id;
		Elfic::cosRedirect($url);
	}
	
	function prepare($id="", $tipo = ""){
		
		$this->tipo = $tipo;
		
		$username = $_REQUEST['login'];
		$email = $_REQUEST['email'];
		$error = null;
		if(Usuarios::chkUser($username, $id, $tipo)){
			$error = "El nombre de usuario ya existe en el sistema.";
		} 
		if(Usuarios::chkEmail($email, $id)){
			$error .= " El Email ya existe en el sistema";
		}
		if(isset($error)){
			if($id != ""){
				return true; //Elfic::cosRedirect('index2.php?com=usuarios&do=view&uid='.$id, $error);
			} else {
				return true; //Elfic::cosRedirect('index2.php?com=usuarios&do=new', $error);
			}
		} else {
			return false;
		}
	}
	
	function chkEmail($email, $id = '')
	{
		$and = '';
		if($id != ''){
			$and = "AND id != $id";
		}
		$db = new DB();
		$sql = "SELECT id FROM " . TBL_USUARIOS . " WHERE email = '$email' ".$and;
		$result = $db->queryUniqueValue($sql);
		if($result){
			return true;
		}
		return false;
	}
	
	function chkUser($username, $id = '', $tipo = "")
	{
		$and = '';
		if($id != ''){
			$and = "AND id != $id";
		}
		$db = new DB();
		$sql = "SELECT id, login, activo FROM " . TBL_USUARIOS 
		     . " WHERE login = '$username' ".$and;
		$result = $db->queryUniqueObject($sql);
		if($result){
			if($result->activo == 0)
			{
				Usuarios::activar($result->login, $result->id, $tipo);
			}
			return true;
		}
		return false;
	}
	
	/**
	 * Activa un usuario que ha sido borrado
	 */
	public function activar($login, $id, $tipo = "")
	{
		$db = new DB();
		$data = array();
		$data['activo'] = 1;
		$db->perform(TBL_USUARIOS, $data, 'update', 'login='.$login);
		$url = "index2.php?com=usuarios&do=".$tipo."&uid=".$id;
		$msg = "El documento de identificación ya existe en el sistema, se reactivó el usuario borrado ";
		Elfic::cosRedirect($url, $msg);
	}
	
	/**
	 * @desc Un arreglo con estados de activo o inactivo
	 * @param void
	 * @return array
	 */
	function getEstadosArray()
	{
		$estado = array();
		$estado['1']="Si";
		$estado['0']="No";
		return $estado;
	}
	
	private function _getRoles()
	{
		global $uid;
		
		$where = "";
		
		$db = new DB();
		$sql = "SELECT * FROM " . TBL_GRUPOS;
		$res = $db->query($sql);
		$data = array();
		while($line = $db->fetchNextObject($res))
		{
			$data[$line->usuarios_grupo_id] = $line->usuarios_grupo_nombre;
		}
		return $data;
	}
	
	public function getCamposRol($rolId)
	{
		$output = "";
		
		if($rolId == '3')
		{
			$output = '<table width="100%" cellspacing="0" cellpadding="0">
			   <tr><td class="headlines">Instituci&oacute;n</td>
              <td>
              <select name="instituciones_id" id="instituciones_id" class="required digits"
                      onchange="getComboCursos();" >
                  <option value="">--</option>'
              . $this->_getComboInstituciones() .
              '</td>
              <td class="headlines">Curso</td>
              <td><div id="cursos"></div></td></tr></table>';
		}
		
		if($rolId == '1' || $rolId == '2' )
		{
			$output = '<table width="100%" cellspacing="0" cellpadding="0">
			<tr><td class="headlines">Instituci&oacute;n</td>
			<td>
			<select name="instituciones_id" id="instituciones_id" class="required digits">
			<option value="">--</option>'
			. $this->_getComboInstituciones() .
			'</td>
			<td class="headlines"></td>
			<td><div id="cursos"></div></td></tr></table>';
		}
		echo $output;
	}
	
	private function _getComboInstituciones()
	{
		$output = "";
		
		$db = new DB();
		$sql = "SELECT id, nombre FROM " . TBL_INSTITUCIONES . " WHERE estado = '1' AND borrado = 0";
		$res = $db->query($sql);
		while($line = $db->fetchNextObject($res))
		{
			$output .= "<option value='". $line->id ."'>" . $line->nombre . "</option>"; 
		}
		
		return $output;
	}
	
	public function getComboCursos($id)
	{
		$output = "";
		$output = '<select name="cursos_id" id="cursos_id" class="required digits">'
		        . '<option value="">--</option>';
	
		$db = new DB();
		$sql = "SELECT id, curso FROM " . TBL_CURSOS . " WHERE instituciones_id = $id";
		$res = $db->query($sql);
		while($line = $db->fetchNextObject($res))
		{
			$output .= "<option value='". $line->id ."'>" . $line->curso . "</option>";
		}
	    $output .= '</select>';
		echo $output;
	}
	
    /**
	 * Cambia estado a borrado 1 de un usuario en la db
	 * @param int $id id del usuario
	 */
	public function borrar($id, $tipo="")
	{
		global $uid, $uperms;
		
		$url = "";
		
		$db = new DB();
		$data['activo'] = 0;
		if($this->siEsAdmin($id) && !$this->siEsAdmin($uid))
		{
			$msg = MSG_USUARIO_NODEL_PERMS;
		} 
		else if(AdminInstitucion::esAdminInstitucion($id) && !$this->siEsAdmin($uid) )
		{
			$msg = MSG_USUARIO_NODEL_PERMS;
		}
		else if((Estudiantes::getInstitucion($id) != AdminInstitucion::getInstitucionId($id)) 
				 && !$uperms['superusuario'])
		{
			$msg = MSG_USUARIO_NODEL_PERMS;
		}
		else 
		{
			if(!$db->perform(TBL_USUARIOS, $data, 'update', 'id='.$id))
			{
				$msg = ERR_USUARIO_DEL;
			} else {
				$msg = MSG_USUARIO_DEL;
			}
		}
		
		$url = 'index2.php?com=usuarios';
		if($tipo !="")
		{
			$url .= "&do=".$tipo;
		}
		Elfic::cosRedirect($url, $msg);
	}
	
	/**
	 * Si usuario es superadministrador
	 * @param int $id
	 * @return int 1 - 0
	 */
	public function siEsAdmin($id)
	{
		$db = new DB();
		$sql = "SELECT esadmin FROM usuarios WHERE id=$id";
		return $db->queryUniqueValue($sql);
	}
	
}

?>