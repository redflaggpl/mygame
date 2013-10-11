<?php /* Smarty version 2.6.26, created on 2011-01-13 10:02:21
         compiled from usuariosNew.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'usuariosNew.tpl', 86, false),)), $this); ?>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    	$("#adminForm").validate();
    	// validate signup form on keyup and submit
			$("#adminForm").validate({
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
'; ?>

<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <th class="newproc">
		Nuevo Usuario
      </th>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
         <form name="adminForm" id="adminForm" method="post" action="index2.php?com=usuarios&do=new">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <th colspan="6">Datos del Usuario</th>
            </tr>
            <tr>
              <td class="headlines">Nombre</td>
              <td><input name="name" type="text" id="name" size="30" maxlength="255" class="required" "/></td>
              <td class="headlines">Usuario (login)</td>
              <td><input name="username" type="text" id="username" size="30" maxlength="100" class="required" "/></td>
            </tr>
            <tr>
              <td class="headlines"></td>
              <td></td>
              <td class="headlines">Email</td>
              <td><input name="email" type="text" id="email" size="30" maxlength="50" class="required email" ></td>
            </tr>
             <tr>
              <td  class="headlines"><label for="password">Contraseña</label></td>
				<td><input id="password" name="password" type="password" /> </td>
				<td  class="headlines"><label for="confirm_password">Confirmar Contraseña</label> </td>
				<td><input id="confirm_password" name="confirm_password" type="password" equalTo="#password"/></td>
            </tr>
           <tr>
              <td class="headlines"></td>
              <td></td>
              <td class="headlines">Estado</td>
              <td>
              	<select name="block" id="block" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['blockvalues']), $this);?>

					</select> 
              </td>
            </tr>
            <tr>
              <td class="headlines">
              	<input type="hidden" name="do_save" value="do" />
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
	
		</td>
	</tr>
</table>
</div>
</div><br></br>
   