<?php

class Password extends Elfic {
	
	/* Envia mail recordando contraseña
	 *
	*/
	function reminder($ueml, $front = 0){
		$url = APP_URL_ADM;
		
		if(!Usuarios::chkemail($ueml)){
			$msg =  "Error. El email no existe en nuestros registros, ";
			$msg .= "debe ingresar el correo electr&oacute;nico asociado a su cuenta.";
			Elfic::cosRedirect('index.php?action=recordar', $msg);
		} else {
	
		$token = $this->generarToken();
		$link  = "<a href=\"".$url."index.php?action=update&ueml=".$ueml."&token=".$token."&front=".$front."\" target=\"_blank\">";
		$link .= $url."index.php?action=update&ueml=".$ueml."&token=".$token."&front=".$front."</a>";
		$mensaje = "Usted o alguien m&aacute;s ha solicitado recordar su contrase&ntilde;a en ";
		$mensaje .= "MyGame<br>";
		$mensaje .= "Si desea cambiarla haga click en el siguiente enlace ".$link;
		$mensaje .= "<br>De lo contrario su cuenta permanecer&aacute; sin modificaciones";
	
		$mail = new PHPMailer();
		$mail->IsSMTP();
	
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->Username = "edison.galindo@gmail.com";
		$mail->Password = "neKrom4n";
	
		$mail->From = 'no-reply@educameta.co';
		$mail->FromName = 'MyGame';
		$mail->Subject 	= "Recuperando contraseña";
		$mail->AddAddress($ueml, "Destinatario");
		$body = $mensaje;
		$mail->Body = $body;
		$mail->IsHTML(true);
	
		if(!$mail->Send()) {
			$msg  = "Error. No fue posible enviar un mensaje a su email con el procedimiento ";
			$msg .= "para recuperar su contrase&ntilde;a. ";
			$msg .= "Por favor intente de nuevo o informe al administardor. ". $mail->ErrorInfo;
			echo "<div class=\"mensaje\">".$msg."<div>";
		} else {
			$msg = "Se ha enviado a su email un mensaje con un enlace y codigo para cambiar su contrase&ntilde;a.";
			echo "<div class=\"mensaje\">".$msg."<div>";
		}
		}
	}
	
	function generarToken(){
		$token = $this->getUniqueCode();
		$db = new DB();
		$sql  = "INSERT INTO tokens (token_id, token_used) ";
		$sql .= " VALUES ('$token', 'n')";
		$db->execute($sql);
		return $token;
	}
	
	function getUniqueCode($length = 8){
		$code = md5(uniqid(rand(), true));
		if ($length != "") return substr($code, 0, $length);
		else return $code;
	}
	
	function chk_token($token){
		$db = new DB();
		$sql = "SELECT token_id, token_used FROM tokens WHERE token_id = '$token' AND token_used='n'";
		$res = $db->query($sql);
		if($db->numRows($res) > 0){
			return true;
		}
		return false;
	}
	
	function actualiza($ueml, $token, $password, $front = 0){
	
		if($front == 0) $url = APP_URL_ADM.'index.php';
		else $url = APP_URL.'index.php';
		
		$id = $_REQUEST['uid'];
		$cleanpasswd = $_REQUEST['password'];
		$passwdenc = AuthUser::encrypt_password($cleanpasswd);
		$db = new DB();
		$sql  = "UPDATE " . TBL_USUARIOS . " SET password = '$passwdenc' ";
		$sql .= "WHERE email = '$ueml'";
		$db->execute($sql);
		
		$sql = "DELETE FROM tokens WHERE token_id = '$token'";
		$db->execute($sql);
		
		$msg = "Su contrase&ntilde;a ha sido actualizada";
		Elfic::cosRedirect($url, $msg);
	
		
	}
	

}

?>