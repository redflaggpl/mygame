<div align="center" class="centermain">
  <div class="main">
    <table class="adminheading">
    <tr>
      <th>
        Estudiantes
      </th>
      </tr>
    </table>
    <table class="adminlist">
    <tr>
      <th class="title">#</th>
      <th class="title">Curso</th>
      <th class="title">Reporte</th>
    </tr>
   {section name=row loop=$data}
   <tr bgcolor="{cycle values="#f4f4f4,#e8e8e8"}" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)">
      <td>{$smarty.section.row.iteration}</td>
      <td>{$data[row].curso}</td>
      <td><a href="index2.php?com=reportes&do=curso&cursos_id={$data[row].id}">Ver</a></td>
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

