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
        Administradores de Institución: 
      </th>
      <th width="350">
      	<table>
      	<form id="adminForm" action="{$smarty.server.SCRIPT_NAME}?com=usuarios&do=admin_institucion" method="post" name="adminForm">
    		<tr>
    			<td><input name="search" type = "text" id="search" value=""></td>
    		 	{if $tipo eq "Usuarios"}
    		 	<td>
    		 	<select name="perfil" id="perfil">
    		 	<option value="">Seleccione</option>
    				{html_options options=$perfil }
    		 	</select>
    		 	</td>
    		 	{/if}
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
      <th class="title">Institucion</th>
      <th class="title">Acciones</th>
    </tr>
   {section name=row loop=$u}
   <tr bgcolor="{cycle values="#f4f4f4,#e8e8e8"}" onmouseover="rowOverEffect(this)" 
       onmouseout="rowOutEffect(this)" >
      <td onclick="document.location.href='?com=usuarios&do=view_admininstitucion&uid={$u[row].id}'">{$smarty.section.row.iteration}</td>
      <td onclick="document.location.href='?com=usuarios&do=view_aadmininstitucion&uid={$u[row].id}'">{$u[row].id}</td>
      <td onclick="document.location.href='?com=usuarios&do=view_admininstitucion&uid={$u[row].id}'">{$u[row].usuario}</td>
      <td onclick="document.location.href='?com=usuarios&do=view_admininstitucion&uid={$u[row].id}'">{$u[row].institucion}</td>
      <td><a href="index2.php?com=usuarios&do=view_admininstitucion&uid={$u[row].id}">Editar</a> | 
          <a href="index2.php?com=usuarios&do=borrar&uid={$u[row].id}&tipo=admin_institucion" 
             onclick='return confirmar("¿Confirma que desea borrar este usuario?");'>Borrar</a></td>
    </tr>
    {sectionelse}
    <tr>
      <td colspan="8">No se han registrado Administradores de Institución</td>
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

