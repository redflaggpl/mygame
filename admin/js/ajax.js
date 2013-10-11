function nuevoAjax(){
	var xmlhttp=false;
 	try {
 		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 	} catch (e) {
 		try {
 			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 		} catch (E) {
 			xmlhttp = false;
 		}
  	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
 		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}


 function confirmar ( mensaje ) {
	 return confirm( mensaje );
 }
 
 function cerrar(capa) {
	 div = document.getElementById(capa);
	 div.style.display='none';
	 
}
 

function cambiar(nomimg)
{
	document.forms.adminForm.urlfoto.value=nomimg;
}

function setCamposRolUsuario()
{
	var rol;
	
	campos = document.getElementById('campos');
	rol = document.getElementById('rol').value;
	ajax=nuevoAjax();
	ajax.open("GET", "consultas.ajax.php?act=userfields&rol="+rol,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			campos.innerHTML = ajax.responseText;
		 }
	}
	ajax.send(null);
}

function getComboCursos()
{
	var instId;
	
	cursos = document.getElementById('cursos');
	instId = document.getElementById('instituciones_id').value;
	ajax=nuevoAjax();
	ajax.open("GET", "consultas.ajax.php?act=cursoscombo&instId="+instId,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			cursos.innerHTML = ajax.responseText;
		 }
	}
	ajax.send(null);
}

function getComboCursosInstitucion()
{
	var instId;
	
	cursos = document.getElementById('campos');
	instId = document.getElementById('instituciones_id').value;
	ajax=nuevoAjax();
	ajax.open("GET", "consultas.ajax.php?act=cursoscombo&instId="+instId,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			cursos.innerHTML = ajax.responseText;
		 }
	}
	ajax.send(null);
}

/**
 * Combo docentes de una institución
 */
function getDocentesCombo()
{
	var instId;
	docentes_combo = document.getElementById('docentes_combo');
	instId = document.getElementById('instituciones_id').value;
	ajax=nuevoAjax();
	ajax.open("GET", "consultas.ajax.php?act=docentescombo&instId="+instId,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			docentes_combo.innerHTML = ajax.responseText;
		 }
	}
	ajax.send(null);
}

/**
 * @desc registra usuario en gripo
 * @param int usuario_id
 * @param int group_id
 * @return
 */
function setGroup(usuario_id, group_id){
	var action, ele;
	
	msggrupos = document.getElementById('msggrupos');
	ele = document.getElementById('grupos['+group_id+']');
	if(ele.checked){
		action = 'setGroup';
	} else {
		action = 'unsetGroup';
	}
	ajax = nuevoAjax();
	ajax.open("GET", "index2.php?com=usuarios&do=ajax&tpl=clean&act="+action+"&uid="+usuario_id+"&gid="+group_id, true);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			msggrupos.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}