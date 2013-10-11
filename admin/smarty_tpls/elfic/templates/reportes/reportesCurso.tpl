<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <td class="curso">
		<h2>{$curso} - {$institucion}</h2>
      </td>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <th colspan="3">Detalle de Estudiantes</th>
        </tr>
        <tr>
        <th class="title">#</th>
	      <th class="title">Estudiante</th>
	      <th class="title">Max. Desafio Aprobado</th>
	    </tr>
        {section name=row loop=$estudiantes}
	   <tr bgcolor="{cycle values="#f4f4f4,#e8e8e8"}" onmouseover="rowOverEffect(this)" 
	       onmouseout="rowOutEffect(this)" 
	       >
	      <td >{$smarty.section.row.iteration}</td>
	      <td>{$estudiantes[row].estudiante}</td>
	      <td>{$estudiantes[row].desafio}</td>
	    </tr>
	    {sectionelse}
	    <tr>
	      <td colspan="7">No se han registrado instituciones</td>
	    </tr>
	    {/section}
	    </table>
	  </td>
      <td width="1%">&nbsp;</td>
      	<td width="49%" valign="top">
			{$torta}
		</td>
	</tr>
</table>
</div>
</div>
<div align="center" class="centermain"> 
	<div class="main">
		<table class="adminheading">
			<tr>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>
			
		</table>
	</div>
</div>