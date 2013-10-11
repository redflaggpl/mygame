{literal}
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    	$("#adminForm").validate();
    	$("#adminForm8").validate();
    	$.validator.setDefaults({
		//submitHandler: function() { alert("submitted!"); }
		});
 
		$("#adminForm2").validate();
			
			// validate signup form on keyup and submit
			$("#adminForm2").validate({
				rules: {
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					}
				},
				messages: {
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					}
				}
			});
			
			// check if confirm password is still valid after password changed
			$("#password").blur(function() {
				$("#confirm_password").valid();
			});
		});
	</script>
	<script src="js/popupSmall.js" type="text/javascript"></script>
{/literal}
<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>

      <th class="usersnew">
	      Edici&oacute;n de Usuario {$nombres} ({$login}) 
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
               action="index2.php?com=usuarios&do=view">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <th colspan="6">Datos del Usuario</th>
            </tr>
             <tr>
              <td class="headlines">Nombres</td>
              <td><input name="nombres" type="text" id="nombres" size="30" 
                  maxlength="20" class="required" value="{$nombres}"/></td>
              <td class="headlines">Apellidos</td>
              <td><input name="apellidos" type="text" id="apellidos" size="30" 
                  maxlength="20" value="{$apellidos}"/></td>
            </tr>
           <tr>
            <td class="headlines">Documento de Identificaci&oacute;n (Login)</td>
              <td><input name="login" type="text" id="login" size="30" maxlength="50" 
                  class="required digits" value="{$login}"></td>
              <td class="headlines">Email</td>
              <td><input name="email" type="text" id="email" size="30" maxlength="50" 
                  class="required email" value="{$email}">
              </td>
              
            </tr>
           <tr>
              <td class="headlines">Activo</td>
              <td>
              	<select name="activo" id="activo" class="required">
					<option value="">--Seleccione--</option>
		  			{html_options options=$estados_combo selected=$activo }
					</select> 
              </td>
              <td class="headlines">Administrador</td>
              <td>
              	<select name="esadmin" id="esadmin" class="required">
					<option value="">--Seleccione--</option>
		  			{html_options options=$estados_combo selected=$esadmin}
					</select> 
              </td>
            </tr>
            <tr>
              <td class="headlines">
              	<input type="hidden" name="do_edit" value="do" />
              	<input type="hidden" name="uid" value="{$uid}" />
              </td>
              <td><input type="submit" name="Submit" value="Enviar" /> <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=usuarios'"></td>
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
	    <h2 class="tab">Infromaci&oacute;n</h2>
	    {literal}
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "info-page" ) );
	    </script>
	    {/literal}
	   <p>Fecha de Creaci&oacute;n: {$registerDate}</p>
	   <p>&Uacute;ltimo Ingreso: {$lastvisitDate}</p>
	  </div>
	  <!-- fin tab info -->
	  <!--  inicio tab permisos -->
	  <div class="tab-page" id="permisos-page">
	    <h2 class="tab">Grupos / Roles</h2>
	    {literal}
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "permisos-page" ) );
	    </script>
	    {/literal}
	    <div id="msggrupos"></div>
	    <table width="100%" class="adminform">
        <tr>
          <td>
             {$grupos}
          </td>
         </tr>
         </table>
	  </div>
		 <!-- fin tab permisos -->
		
		   <div class="tab-page" id="budget-page">
		    <h2 class="tab">Contrase&ntilde;a</h2>
		    {literal}
		    <script type="text/javascript">
		      tabPane1.addTabPage( document.getElementById( "passwd-page" ) );
		    </script>
		    {/literal}
		    <table width="100%" class="adminform">
        <tr>
          <td>
          <form name="adminForm2" id="adminForm2" method="post" action="{$smarty.server.SCRIPT_NAME}?com=usuarios&do=chpass&uid={$id}"> 
	      	<table width="100%" cellspacing="0" cellpadding="0">
	            <tr>
	              <th colspan="6">Contrase&ntilde;a</th>
	            </tr>
	            <tr>
	              <td><label for="password">Contrase&ntilde;a</label></td>
	              <td><input id="password" name="password" type="password" /> </td>
	              <td></td>
	              <td></td>
	            </tr>
	            <tr>
	              <td><label for="confirm_password">Confirmar Contrase&ntilde;a</label> </td>
	              <td><input id="confirm_password" name="confirm_password" type="password" equalTo="#password"/></td>
	              <td></td>
	              <td></td>
	            </tr>
	           	<tr>
	              <td><input type="hidden" name="uid" value="{$uid}" /></td>
	              <td><input type="submit" name="Submit" value="Enviar" /></td>
	              <td></td>
	              <td></td>
	            </tr>
	          </table>
	          </form>
	         </td>
	        </tr>
	       </table>
		    </div>
		   </div><!-- cierre pestañas -->
		</td>
	</tr>
</table>
</div>
</div>