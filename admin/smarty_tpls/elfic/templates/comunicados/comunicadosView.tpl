{literal}
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/popup.js" type="text/javascript"></script>  	
{/literal}
<div align="center" class="centermain"> 
	<div class="main">
	<div id="msg"></div>
<table class="adminheading">
    <tr>
      <th class="comlist">
		Comunicados
      </th>
      <th width="350">
      	<table width="300" >
      	    <tr>
      	        <td><a href="index2.php?com=comunicados">&raquo; Recibidos</a></td>
      	        <td><a href="index2.php?com=comunicados&do=enviados">&raquo; Enviados</a></td>
      	        <td><a href="index2.php?com=comunicados&do=borrados">&raquo; Borrados</a></td>
      	    </tr>
    	</table>
    </th>
   </tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
            <form name="adminForm" id="adminForm" method="post" action="index2.php?com=comunicados&do=new">
 			  <table width="100%" cellspacing="0" cellpadding="0">
			    <tr>
				  <th colspan="6">Mensaje</th>
				</tr>
				<tr>
				   <td class="headlines">Asunto</td>
				   <td>{$asunto}</td>
				   <td class="headlines"></td>
				   <td></td>
				</tr>
				<tr>
					<td class="headlines">Para</td>
					<td><!-- {html_checkboxes name='dests' options=$destinatarios separator='<br />'} -->
					    <div id="button"><a href="#" class="actionnew">Ver Destinatarios</a></div>
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class="headlines">Adjuntos</td>
					<td>
					    {section name=row loop=$adjuntos}
					      <!--  &raquo; <a href="{$adjuntos[row].path}{$adjuntos[row].url}">{$adjuntos[row].url}</a><br> -->
					       <!-- &raquo; <a href="#" onclick="downloadAdjunto({$adjuntos[row].id},{$consecu});">{$adjuntos[row].url}</a><br> -->
					       &raquo; <a href="consultas.ajax.php?act=download&id={$adjuntos[row].id}&consecu={$consecu}">{$adjuntos[row].url}</a><br>
					    {/section}
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
				  <td class="headlines" colspan="4">Mensaje</td>
				</tr>
				<tr>
				  <td colspan="4">
				    {$mensaje}
				  </td>
				</tr>
				
			   </table>
			   <!-- ajax popup form crear produccion -->
               <div id="popupContact">
	               <a href="#" id="popupContactClose">X</a>
	               <div id="formpopup">
	                   <table>
	                       <tr>
	                           <td class="headlines">Estudiantes</td><td class="headlines">Profesores</td>
	                       </tr>
	                       <tr>
	                           <td  valign="top">
	                           <table>
	                           {section name=row loop=$dest_est}
					            <tr bgcolor="{cycle values="#f4f4f4,#e8e8e8"}">
							        <td>{$smarty.section.row.iteration}</td>
								    <td><input type="checkbox" id="cb{$smarty.section.row.index}" 
								                name="dest_est[{$smarty.section.row.index}]"
										        value="{$dest_est[row].documto_id}" /></td>
								    <td>{$dest_est[row].fullname}</td>
								</tr>
							    {/section}
							    </table>
							    </td>
							    <td valign="top">
							    	<table>
							    	{section name=row loop=$dest_prof}
						            <tr bgcolor="{cycle values="#f4f4f4,#e8e8e8"}">
								        <td>{$smarty.section.row.iteration}</td>
									    <td><input type="checkbox" id="cb2-{$smarty.section.row.index}" 
									                name="dest_prof[{$smarty.section.row.index}]"
											        value="{$dest_prof[row].documto_id}" /></td>
									    <td>{$dest_prof[row].fullname}</td>
								    </tr>
							    {/section}
							    </table>
							    </td>
						    </tr>
		               </table>
	               </div> 
               </div>
               <div id="backgroundPopup"></div>
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
		<!-- incia tab +info -->
	      <div class="tab-page" id="info-page">
	       <h2 class="tab">+ Info</h2>
	         {literal}
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "info-page" ) );
	           </script>
	         {/literal}
	         <table width="90%" cellpadding="5" cellspacing="0" border="0">
	         	<tr>
				  <td class="headlines">Fecha Enviado</td>
				  <td>{$fecha}</td>
				  <td class="headlines">Fecha vencimiento</td>
				  <td>{$fecvence}</td>
				</tr>
				<tr>
				   <td class="headlines">Categoría</td>
				   <td>{$categoriamensaje}</td>
				   <td class="headlines">Tipo</td>
				   <td>{$tipomensaje}</td>
				</tr>
	         </table>
		  </div>
		 <!-- fin tab +info -->
	  </div><!-- cierre tabs -->
    </td>
  </tr>
</table>
</div>
</div><br></br>