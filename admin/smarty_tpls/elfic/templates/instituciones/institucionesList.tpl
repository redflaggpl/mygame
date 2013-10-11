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
      <th class="instituciones">
        Instituciones: 
      </th>
      <th width="350"></th>
    </tr>
    </table>
    <table class="adminlist">
    <tr>
      <th class="title">#</th>
      <th class="title">Nombre</th>
      <th class="title">Municipio</th>
      <th class="title">Estado</th>
      <th class="title">Acciones</th>
    </tr>
   {section name=row loop=$data}
   <tr bgcolor="{cycle values="#f4f4f4,#e8e8e8"}" onmouseover="rowOverEffect(this)" 
       onmouseout="rowOutEffect(this)" 
       >
      <td onclick="document.location.href='?com=instituciones&do=edit&iid={$data[row].id}'">{$smarty.section.row.iteration}</td>
      <td onclick="document.location.href='?com=instituciones&do=edit&iid={$data[row].id}'">{$data[row].nombre}</td>
      <td onclick="document.location.href='?com=instituciones&do=edit&iid={$data[row].id}'">{$data[row].municipio}</td>
      <td onclick="document.location.href='?com=instituciones&do=edit&iid={$data[row].id}'">{$data[row].estado}</td>
      <td>
          <a href="index2.php?com=instituciones&do=edit&iid={$data[row].id}">Editar</a> | 
          <a href="index2.php?com=instituciones&do=borrar&iid={$data[row].id}" 
             onclick="return confirmar('¿Confirma que desea borrar la institución?');">Borrar</a>
      </td>
    </tr>
    {sectionelse}
    <tr>
      <td colspan="7">No se han registrado instituciones</td>
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

