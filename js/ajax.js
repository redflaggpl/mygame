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



