<br />
{if $msg neq ''}
<div class="message">
  {$msg}
</div>
{/if}
{literal}
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    	$("#adminForm").validate();
		});
	</script>
    
{/literal}
<div align="center" class="centermain">
  <div class="main">
    <table class="adminheading">
    <tr>
      <th class="usersnew">
        {$tipo}: 
      </th>
      <th width="350">
      	<table>
      	<form id="adminForm" action="{$smarty.server.SCRIPT_NAME}?com=usuarios&do=search" method="post" name="adminForm">
    		<tr>
    			<td><input name="search" type = "text" id="search" value=""></td>
    		 	<td><input name="do_search" type="submit" id="do_search" value="Buscar"/></td>
    		 </tr>
    	</form>
    	</table>
    </th>
    </tr>
    </table>
    <table class="adminlist">
    <tr>
      <th class="title">#</th>
      <th class="title">Id</th>
      <th class="title">Nombre</th>
      <th class="title">Email</th>
      <th class="title">Registro</th>
      <th class="title">Modificado</th>
      <th class="title">&Uacute;ltima Visita</th>
      <th class="title">Estado</th>
      <th class="title">Administrador</th>
      <th class="title">Acciones</th>
    </tr>
   {section name=row loop=$u}
   <tr bgcolor="{cycle values="#f4f4f4,#e8e8e8"}" onmouseover="rowOverEffect(this)" 
       onmouseout="rowOutEffect(this)" >
      <td onclick="document.location.href='?com=usuarios&do=view&uid={$u[row].id}'">{$smarty.section.row.iteration}</td>
      <td onclick="document.location.href='?com=usuarios&do=view&uid={$u[row].id}'">{$u[row].id}</td>
      <td onclick="document.location.href='?com=usuarios&do=view&uid={$u[row].id}'">{$u[row].nombres} {$u[row].apellidos}</td>
      <td onclick="document.location.href='?com=usuarios&do=view&uid={$u[row].id}'">{$u[row].email}</td>
      <td onclick="document.location.href='?com=usuarios&do=view&uid={$u[row].id}'">{$u[row].creado}</td>
      <td onclick="document.location.href='?com=usuarios&do=view&uid={$u[row].id}'">{$u[row].modificado}</td>
      <td onclick="document.location.href='?com=usuarios&do=view&uid={$u[row].id}'">{$u[row].ultimoingreso}</td>
      <td onclick="document.location.href='?com=usuarios&do=view&uid={$u[row].id}'">{$u[row].activo}</td>
      <td onclick="document.location.href='?com=usuarios&do=view&uid={$u[row].id}'">{$u[row].esadmin}</td>
      <td ><a href="index2.php?com=usuarios&do=borrar&uid={$u[row].id}" 
             onclick='return confirmar("¿Confirma que desea borrar este usuario?");'>Borrar</td>
    </tr>
    {sectionelse}
    <tr>
      <td colspan="8">No existen usuarios</td>
    </tr>
    {/section}
    </table>
   
    <table class="adminlist">
		<tr>
			<th align="center" colspan="2">{$anchors}</th>
		</tr>
		<tr>
			<th align="center" colspan="2">{$total}</th>
		</tr>
	</table>
  </div>
<div id="break"></div>
</div>

