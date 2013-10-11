<div align="center" class="centermain">
  <div class="main">
    <table class="adminheading">
    <tr>
      <th>
        Estudiantes
      </th>
      <th width="350">
      	<table>
      	<form id="adminForm" action="{$smarty.server.SCRIPT_NAME}?com=reportes&do=listar_estudiantes" method="post" name="adminForm">
    		<tr>
    			<td><input name="search" type = "text" id="search" value=""></td>
    		 	<td>
    		 	<select name="cursos_id" id="cursos_id">
    		 	<option value="">Curso</option>
    				{html_options options=$cursos selected=$cursos_id }
    		 	</select>
    		 	</td>
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
      <th class="title">Nombre</th>
      <th class="title">Curso</th>
      <th class="title">Reporte</th>
    </tr>
   {section name=row loop=$data}
   <tr bgcolor="{cycle values="#f4f4f4,#e8e8e8"}" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)">
      <td>{$smarty.section.row.iteration}</td>
      <td>{$data[row].estudiante}</td>
      <td>{$data[row].curso}</td>
      <td><a href="index2.php?com=reportes&do=estudiante&eid={$data[row].id}">Ver</a></td>
    </tr>
    {sectionelse}
    <tr>
      <td colspan="8">No hay registros</td>
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
</div>
<div id="break"></div>
</div>

