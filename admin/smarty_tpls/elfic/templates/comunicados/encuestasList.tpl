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
	<script type="text/javascript">

		function estado(){ 
		    if (document.forms["adminForm1"].chk.checked) 
		     seleccionar_todo();
		    else 
		     deseleccionar_todo();
		} 
	   
        function seleccionar_todo()
		{//Funcion que permite seleccionar todos los checkbox
	
		form = document.forms["adminForm1"]
		for (i=0;i<form.elements.length;i++)
		    {
		    if(form.elements[i].type == "checkbox")form.elements[i].checked=1;
		    }
		} 
	
		function deseleccionar_todo()
		{//Funcion que permite deseleccionar todos los checkbox
	
		form = document.forms["adminForm1"]
		for (i=0;i<form.elements.length;i++)
		    {
		    if(form.elements[i].type == "checkbox")form.elements[i].checked=0;
		    }
		}
	</script>
    
{/literal}
<form id="adminForm1" action="{$smarty.server.SCRIPT_NAME}?com=encuestas" method="post" name="adminForm1">
<div align="center" class="centermain">
  <div class="main">
    <table class="adminheading">
    <tr>
      <th class="comlist">
        Comunicados {$tipo}
      </th>
      <th width="350">
          <table width="300" >
      	    <tr>
      	        <td>
      	            <input name="do" type="hidden" id="do" value="delmul"/>
      	            <input name="delmul" type="submit" id="delmul" value="Borrar"/>
      	        </td>
      	        <td><a href="index2.php?com=comunicados">&raquo; Recibidos</a></td>
      	        <td><a href="index2.php?com=comunicados&do=enviados">&raquo; Enviados</a></td>
      	        <!-- <td><a href="index2.php?com=comunicados&do=borrados">&raquo; Borrados</a></td> -->
      	    </tr>
      	<!-- <form id="adminForm" action="{$smarty.server.SCRIPT_NAME}?com=comunicados" method="post" name="adminForm">
    		<tr>
    			<td><input name="search" type = "text" id="search" value=""></td>
    		 	<td>
    		 	<select name="tipmens" id="tipmens">
    		 	<option value="">Seleccione</option>
    				{html_options options=$tipmens selected=$sel_tipmens}
    		 	</select>
    		 	</td>
    		 	<td>
    		 	<select name="categoria" id="categoria">
    		 	<option value="">Seleccione</option>
    				{html_options options=$categoria selected=$sel_categoria}
    		 	</select>
    		 	</td>
    		 	<td><input name="do_search" type="submit" id="do_search" value="Buscar"/></td>
    		 </tr>
    	</form>  -->
    	</table>
    </th>
    </tr>
    </table>
    <table class="adminlist">
    <tr>
      <th class="title">#</th>
       <th class="title">ID</th>
      <th class="title">
          <input type="checkbox" name="chk" onClick="estado()">
          </th>
      <th class="title">Titulo</th>
      <th class="title">Observaciones</th>
      <th class="title">Fecha de Creación</th>
    </tr>
   {section name=row loop=$com}
   <tr bgcolor="{cycle values="#f4f4f4,#e8e8e8"}">
      <td>{$smarty.section.row.iteration}</td>
      <td>{$com[row].consecu}</td>
      <td><input type="checkbox" name="cb[{$lista[row].id}]" id="cb[{$lista[row].id}]"></td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=comunicados&do=view&eid={$lista[row].id}'">{$com[row].id}</td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=comunicados&do=view&eid={$lista[row].id}'">{$com[row].titulo}</td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=comunicados&do=view&eid={$lista[row].id}'">{$com[row].obsrvaciones}</td>
    </tr>
    {sectionelse}
    <tr>
      <td colspan="8">No hay encuestas disponibles</td>
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
<div id="break">
</div>
</form>

