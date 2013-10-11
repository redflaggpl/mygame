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
		Nueva Institución
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
               action="index2.php?com=instituciones&do=new">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <th colspan="6">Detalles</th>
            </tr>
            <tr>
            <td class="headlines">Nombre</td>
             <td><input name="nombre" type="text" id="nombre" size="30" 
                  maxlength="100" class="required" value=""/></td>
              <td  class="headlines"></td>
              <td>
              <!--
                  <select name="rector_id" id="rector_id" class="required">
					<option value="">--Rector--</option>
		  			{html_options options=$usuarios }
				  </select> -->
              </td>
           </tr>
            <tr>
            <td class="headlines">Municipio</td>
             <td>
             	<select name="municipios_id" id="municipios_id" class="required">
					<option value="">--Municipio--</option>
		  			{html_options options=$municipios }
				  </select> 
             </td>
              <td  class="headlines">Estado</td>
              <td>
                  <select name="estado" id="estado" class="required">
					<option value="">--Estado--</option>
		  			{html_options options=$estados }
				  </select> 
              </td>
           </tr>
            <tr>
              <td class="headlines">
                  <input type="hidden" name="do_save" value="do" />
                  <input type="hidden" name="departamentos_id" value="50" />
              </td>
              <td>
                  <input type="submit" name="Submit" value="Enviar" /> 
                  <input type="button" name="Cancelar" value="Cancelar" 
                         onClick="location.href='index2.php?com=instituciones'">
              </td>
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