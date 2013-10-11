<br />
{if $msg neq ''}
<div class="message">
  {$msg}
</div>
{/if}

<div align="center" class="centermain">
  <div class="main">
    <table class="adminheading">
    <tr>
      <th class="usersnew">
        Cursos: 
      </th>
      <th width="350"></th>
    </tr>
    </table>
    <table class="adminlist">
    <tr>
      <th class="title">#</th>
      <th class="title">Curso</th>
      <th class="title">Grado</th>
      <th class="title">Institución</th>
      <th class="title">Docente</th>
      <th class="title">Estado</th>
      <th class="title">Acciones</th>
    </tr>
   {section name=row loop=$data}
   <tr bgcolor="{cycle values="#f4f4f4,#e8e8e8"}" onmouseover="rowOverEffect(this)" 
       onmouseout="rowOutEffect(this)" >
      <td>{$smarty.section.row.iteration}</td>
      <td onclick="document.location.href='?com=cursos&do=edit&cid={$data[row].id}'">{$data[row].curso}</td>
      <td onclick="document.location.href='?com=cursos&do=edit&cid={$data[row].id}'">{$data[row].grados_id}</td>
      <td onclick="document.location.href='?com=cursos&do=edit&cid={$data[row].id}'">{$data[row].institucion}</td>
      <td onclick="document.location.href='?com=cursos&do=edit&cid={$data[row].id}'">{$data[row].docente}</td>
      <td onclick="document.location.href='?com=cursos&do=edit&cid={$data[row].id}'">{$data[row].estado}</td>
      <td>
      	<a href="index2.php?com=cursos&do=edit&cid={$data[row].id}">Editar</a> |
      	<a href="index2.php?com=cursos&do=borrar&cid={$data[row].id}" 
      	onclick="return confirmar('¿Confirma que desea borrar el registro?');">Borrar</a>
      </td>
      
    </tr>
    {sectionelse}
    <tr>
      <td colspan="7">No se han registrado cursos</td>
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

