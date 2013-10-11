{literal}
	<script src="js/ajax.js" type="text/javascript"></script>
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
	Nuevo curso
      </th>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
         <form name="adminForm" id="adminForm" method="post" 
               action="index2.php?com=cursos&do=new">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <th colspan="6">Detalles</th>
            </tr>
            <tr>
            <td class="headlines">Curso</td>
             <td><input name="curso" type="text" id="curso" size="5" 
                  maxlength="5" class="required" value=""/></td>
              <td  class="headlines">Grado</td>
              <td>
                  <select name="grados_id" id="grados_id" class="required">
					<option value="">--Seleccione--</option>
		  			{html_options options=$grados }
				  </select> 
              </td>
            <tr>
             <td class="headlines">Instituciones</td>
              <td>
                 <select name="instituciones_id" id="instituciones_id" class="required" onchange="getDocentesCombo();">
					<option value="">--Seleccione--</option>
		  			{html_options options=$instituciones }
				  </select>  
              </td>
               <td class="headlines">Docente</td>
              <td><div id="docentes_combo">
                  <select name="profesores_id" id="profesores_id" class="required">
					<option value="">--Seleccione--</option>
		  			<!--{html_options options=$docentes } -->
				  </select>
				  </div>
              </td>
            </tr>
            <tr>
             <td class="headlines">Estado</td>
              <td>
                 <select name="publicado" id="publicado" class="required">
					<option value="">--</option>
		  			{html_options options=$estados }
				  </select>  
              </td>
               <td class="headlines">Comentarios</td>
              <td>
                  <textarea id="comentarios" name="comentarios"></textarea>
              </td>
            </tr>
            <tr>
              <td class="headlines">
                  <input type="hidden" name="do_save" value="do" />
              </td>
              <td><input type="submit" name="Submit" value="Enviar" /> <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=cursos'"></td>
              <td></td>
              <td>&nbsp;</td>
            </tr>
          </table>
           </form>
          </td>
        </tr>
      </table>
    
	  </td>
      <td width="1%">&nbsp;</td>
      	<td width="49%" valign="top">
	<div class="tab-page" id="pdetails-pane">
	  {literal}
	  <script type="text/javascript">
	    var tabPane1 = new WebFXTabPane( document.getElementById( "pdetails-pane" ), 1 );
	  </script>
	  {/literal}
	  <!--  inicio tab info -->
	  <div class="tab-page" id="info-page">
	    <h2 class="tab">Información</h2>
	    {literal}
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "info-page" ) );
	    </script>
	    {/literal}
	  </div>
	  <!-- fin tab info -->
		   </div><!-- cierre pestañas -->
		</td>
	</tr>
</table>
</div>
</div>