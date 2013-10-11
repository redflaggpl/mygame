{literal}
<script src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript">

 var flashvars = {
  name1: "hola",
  name2: "mundo"
 };
 var params = {
  menu: "false",
  wmode: "transparent"
 };
 var attributes = {
  id: "contenidoDinamico",
  name: "contenidoDinamico"
 };
swfobject.embedSWF("swf/MyGame.swf", "flashContent", "1000", "600", "9.0.0","expressInstall.swf", flashvars, params, attributes);
</script>
{/literal}
<div id="container-interfaz">
<div id="flashContent">
   <p>Para ver el contenido necesitas tener Adobe Flash Player instalado</p>
 </div>
 <div id="rightcol"></div>
 </div>