<?php 
$auth = new AuthUser();

//user id como globlal
$uid = $_SESSION['uid'];
//login como global
$login = $_SESSION['login'];
//numero de desafio como global

if(!$auth->isLoggedIn()) {
	Elfic::cosRedirect('index.php?action=login');
}

$uperms['desafios_r'] = true; //$auth->checkRight('DESAFIOS_R');
$uperms['desafios_w'] = $auth->checkRight('DESAFIOS_W');
$uperms['usuarios_r'] = $auth->checkRight('USUARIOS_R');
$uperms['usuarios_w'] = $auth->checkRight('USUARIOS_W');
$uperms['cursos_r'] = $auth->checkRight('CURSOS_R');
$uperms['cursos_w'] = $auth->checkRight('CURSOS_W');
$uperms['instituciones_r'] = $auth->checkRight('INSTITUCIONES_R');
$uperms['instituciones_w'] = $auth->checkRight('INSTITUCIONES_W');