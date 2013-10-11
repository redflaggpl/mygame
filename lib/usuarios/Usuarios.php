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
	 * @param $id documto_id del usuario
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
	function listAll($search=""){
		
		if($search != ""){
			$where = "WHERE nombres LIKE '%$search%' OR apellidos LIKE '%$search%' ";
		}
		
		$db = new DB();
		$sql  = "SELECT * FROM usuarios ";
		$sql .= $where;
		$sql .= " ORDER BY nombres ASC";
		
		
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
		//$tpl->assign('grupos',Perfiles::getPerfiles());
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
		$tpl->assign('esadmin',$this->getEstadosArray());
	    $tpl->display('usuarios/usuariosNew.tpl');
	}
	
	/**
	 * @desc Form de edición de usuario, perfiles, estado
	 */
	public function edit(){
		global $uid;
		
		$tpl = new Elfic_Smarty();
		$data = $this->getUser($this->_id);
		$tpl->assign('uid',$data->id);
		$tpl->assign('nombres',$data->nombres);
		$tpl->assign('apellidos',$data->apellidos);
		$tpl->assign('login',$data->login);
		$tpl->assign('email',$data->email);
		$tpl->assign('creado', $data->creado);
		$tpl->assign('ultimoingreso', $data->ultimoingreso);
		$tpl->assign('activo_combo',$this->getEstadosArray());
		$tpl->assign('esadmin_combo',$this->getEstadosArray());
		$tpl->assign('activo', $data->activo);
		$tpl->assign('esadmin', $data->esadmin);
		$grp = new Grupos();
		$tpl->assign('grupos', $grp->chkUserGroup($this->_id));
	    $tpl->display('usuarios/usuarioEdit.tpl');
	}
	
	/**
	 * @desc Registra datos básicos de un Usuario. Insert o Update
	 * @param string $cerrar
	 * @return int $id
	 */
	public function save($action=null){
		global $uid;
		
		$db = new DB();
		$data = array();
		$data['tipdoc'] = $db->sqlInput($_REQUEST['tipdoc'], 'int');
		$data['priape'] = $db->sqlInput($_REQUEST['priape'], 'string');
		$data['segape'] = $db->sqlInput($_REQUEST['segape'], 'string');
		$data['prinom'] = $db->sqlInput($_REQUEST['prinom'], 'string');
		$data['segnom'] = $db->sqlInput($_REQUEST['segnom'], 'string');
		$data['direccion'] = $db->sqlInput($_REQUEST['direccion'], 'string');
		$data['fecnac'] = $db->sqlInput($_REQUEST['fecnac'], 'string');
		$data['tippers'] = $db->sqlInput($_REQUEST['tippers'], 'string');
		$data['login'] = $db->sqlInput($_REQUEST['login'], 'string');
		$data['email'] 		= $db->sqlInput($_REQUEST['email'], 'string');
		$data['perfil']		= $db->sqlInput($_REQUEST['perfil'], "int");
		$data['activo']		= $db->sqlInput($_REQUEST['activo'], "int");
		if($action == "new"){
			$data['documto_id']= $_REQUEST['documto_id'];
			$data['registerDate']= date("Y-n-j"." "."H:i:s");
			$data['clave'] 	= AuthUser::encrypt_password($_REQUEST['clave']);
			$db->perform('personas', $data);
			$id = $_REQUEST['documto_id'];
				
		} else {
			if(isset($_REQUEST['clave']) && $_REQUEST['clave'] != ""){
				$data['clave'] 	= $db->sqlInput($_REQUEST['clave'], 'string');
			}
			$id	= $db->sqlInput($_REQUEST['uid'], 'int');
			$db->perform('personas', $data, 'update', 'documto_id='.$id);
		}
		$url = "index2.php?com=usuarios&do=view&uid=".$id;
		Elfic::cosRedirect($url);
	}
	
	/**
	 * Lista Grupos a los que pertenece un usuario
	 */
	
	function chpasswd(){
		$id = $_REQUEST['uid'];
		$cleanpasswd = $_REQUEST['password'];
		$passwdenc = AuthUser::encrypt_password($cleanpasswd);
		$db = new DB();
		$sql  = "UPDATE personas SET clave = '$passwdenc' ";
		$sql .= "WHERE documto_id = '$id'";
		$db->execute($sql);
		$url = "index2.php?com=usuarios&do=view&uid=".$id;
		Elfic::cosRedirect($url);
	}
	
	function prepare($id=""){
		
		$username = $_REQUEST['login'];
		$email = $_REQUEST['email'];
		$error = null;
		if(usuarios::chkUser($username, $id)){
			$error = "El nombre de usuario ya existe en el sistema.";
		} 
		if(Usuarios::chkEmail($email, $id)){
			$error .= " El Email ya existe en el sistema";
		}
		if(isset($error)){
			if($id != ""){
				Elfic::cosRedirect('index2.php?com=usuarios&&do=view&uid='.$id, $error);
			} else {
				Elfic::cosRedirect('index2.php?com=usuarios&do=new', $error);
			}
		} else {
			return false;
		}
	}
	
	function chkEmail($email, $id = '')
	{
		$and = '';
		if($id != ''){
			$and = "AND documto_id != $id";
		}
		$db = new DB();
		$sql = "SELECT documto_id FROM personas WHERE email = '$email' ".$and;
		$result = $db->queryUniqueValue($sql);
		if($result){
			return true;
		}
		return false;
	}
	
	function chkUser($username, $id = '')
	{
		$and = '';
		if($id != ''){
			$and = "AND documto_id != $id";
		}
		$db = new DB();
		$sql = "SELECT documto_id FROM personas WHERE login = '$username' ".$and;
		$result = $db->queryUniqueValue($sql);
		if($result){
			return true;
		}
		return false;
	}
	
	/**
	 * @desc los 5 más recientes registros de usuario
	 */
	public function last($n)
	{
		$db = new DB();
		$sql  = "SELECT id, name, username, registerDate ";
		$sql .= "FROM jos_users ORDER BY registerDate DESC LIMIT $n ";
		$res =$db->query($sql);
		$i = 0;
		$u = array();
		while($line = $db->fetchNextObject($res))
		{
			$u[$i]['id'] = $line->id;
			$u[$i]['name'] = $line->name;
			$u[$i]['username'] = $line->username;
			$u[$i]['registerDate'] = $line->registerDate;
			$i++;
		}
		return $u;
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
	
	public function getTiposPersona()
	{
		$db = new DB();
		$sql = "SELECT * FROM tippers";
		$res = $db->query($sql);
		$data = array();
		while($line = $db->fetchNextObject($res))
		{
			$data[$line->codigo] = $line->descrip;
		}
		return $data;
	}
	
	/**
	 * Retorna la fecha del más reciente ingreso de un usuario
	 * @param int $id
	 * @return String
	 */
	public function getUltimoIngreso($id)
	{
		$db = new DB();
		$sql = "SELECT ultimo_ingreso FROM usuarios WHERE id = $id";
		return $db->queryUniqueValue($sql);
	}
}

?>