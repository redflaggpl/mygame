<?php /* Smarty version 2.6.26, created on 2012-05-29 17:27:37
         compiled from usuarios/estudiantesNew.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'usuarios/estudiantesNew.tpl', 93, false),)), $this); ?>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    	$("#adminForm").validate();
    	$.validator.setDefaults({
		//submitHandler: function() { alert("submitted!"); }
		});
 
		$("#adminForm").validate();
			
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
'; ?>


<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <th class="usersnew">
	Nuevo Estudiante
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
               action="index2.php?com=usuarios&do=nuevo_estudiante">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <th colspan="6">Datos del Estudiante</th>
            </tr>
            <tr>
              <td class="headlines">Nombres</td>
              <td><input name="nombres" type="text" id="nombres" size="30" 
                  maxlength="20" class="required" value=""/></td>
              <td class="headlines">Apellidos</td>
              <td><input name="apellidos" type="text" id="apellidos" size="30" 
                  maxlength="20" value=""/></td>
            </tr>
           <tr>
            <td class="headlines">CC-TI-NUIP<br>(Login)</td>
              <td><input name="login" type="text" id="login" size="30" maxlength="50" 
                  class="required digits" value=""></td>
              <td class="headlines">Email</td>
              <td><input name="email" type="text" id="email" size="30" maxlength="50" 
                  class="required email" value="">
              </td>
              
            </tr>
            <tr>
              <td class="headlines">Institucion</td>
              <td>
                 <select name="instituciones_id" id="instituciones_id" class="required" onchange="getComboCursosInstitucion();">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['instituciones']), $this);?>

				  </select>  
              </td>
              <td class="headlines">Curso</td>
              <td>
                <div id="campos">
                  <select name="cursos_id" id="cursos_id" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['cursos']), $this);?>

				  </select> 
				  </div>
              </td>
           </tr>
           <tr>
              <td class="headlines">Activo</td>
              <td>
              	<select name="activo" id="activo" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['activo']), $this);?>

					</select> 
              </td>
              <td class="headlines"></td>
              <td></select> 
              </td>
           </tr>
           </table>
            <div id="campos"></div>
            <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
	              <td class="headlines"><label for="password">Contrase&ntilde;a</label></td>
	              <td><input id="password" name="password" type="password" class="required"/> </td>
	              <td class="headlines"><label for="confirm_password">Confirmar Contrase&ntilde;a</label> </td>
	              <td><input id="confirm_password" name="confirm_password" type="password" equalTo="#password"/></td>
	        </tr>
            <tr>
              <td class="headlines">
                  <input type="hidden" name="do_save" value="do" />
              </td>
              <td><input type="submit" name="Submit" value="Enviar" /> 
              <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=usuarios&do=estudiantes'"></td>
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
	  <?php echo '
	  <script type="text/javascript">
	    var tabPane1 = new WebFXTabPane( document.getElementById( "pdetails-pane" ), 1 );
	  </script>
	  '; ?>

	  <!--  inicio tab info -->
	  <div class="tab-page" id="info-page">
	    <h2 class="tab">Informaci&oacute;n</h2>
	    <?php echo '
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "info-page" ) );
	    </script>
	    '; ?>

	  </div>
	  <!-- fin tab info -->
		   </div><!-- cierre pestañas -->
		</td>
	</tr>
</table>
</div>
</div>