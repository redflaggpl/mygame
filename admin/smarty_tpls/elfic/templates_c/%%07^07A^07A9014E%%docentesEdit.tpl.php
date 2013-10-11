<?php /* Smarty version 2.6.26, created on 2012-06-01 15:42:05
         compiled from usuarios/docentesEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'usuarios/docentesEdit.tpl', 92, false),)), $this); ?>
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
'; ?>


<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <th class="usersnew">
	Edición de Docente
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
               action="index2.php?com=usuarios&do=view_docente">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <th colspan="6">Datos del Docente</th>
            </tr>
            <tr>
              <td class="headlines">Nombres</td>
              <td><input name="nombres" type="text" id="nombres" size="30" 
                  maxlength="20" class="required" value="<?php echo $this->_tpl_vars['nombres']; ?>
"/></td>
              <td class="headlines">Apellidos</td>
              <td><input name="apellidos" type="text" id="apellidos" size="30" 
                  maxlength="20" value="<?php echo $this->_tpl_vars['apellidos']; ?>
"/></td>
            </tr>
           <tr>
            <td class="headlines">CC-TI-NUIP<br>(Login)</td>
              <td><input name="login" type="text" id="login" size="30" maxlength="50" 
                  class="required digits" value="<?php echo $this->_tpl_vars['login']; ?>
"></td>
              <td class="headlines">Email</td>
              <td><input name="email" type="text" id="email" size="30" maxlength="50" 
                  class="required email" value="<?php echo $this->_tpl_vars['email']; ?>
">
              </td>
              
            </tr>
            <tr>
              <td class="headlines">Institucion</td>
              <td>
                 <select name="instituciones_id" id="instituciones_id" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['instituciones'],'selected' => $this->_tpl_vars['institucion_id']), $this);?>

				  </select>  
              </td>
              <td class="headlines"></td>
              <td></td>
           </tr>
           <tr>
              <td class="headlines">Activo</td>
              <td>
              	<select name="activo" id="activo" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['estados_combo'],'selected' => $this->_tpl_vars['activo']), $this);?>

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
	              <td><input id="password" name="password" type="password" class=""/> </td>
	              <td class="headlines"><label for="confirm_password">Confirmar Contrase&ntilde;a</label> </td>
	              <td><input id="confirm_password" name="confirm_password" type="password" equalTo="#password"/></td>
	        </tr>
            <tr>
              <td class="headlines">
                  <input type="hidden" name="do_edit" value="do" />
                  <input type="hidden" name="uid" value="<?php echo $this->_tpl_vars['uid']; ?>
" />
              </td>
              <td><input type="submit" name="Submit" value="Enviar" /> 
              <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=usuarios&do=docentes'"></td>
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

	    <p>Fecha de Creaci&oacute;n: <?php echo $this->_tpl_vars['creado']; ?>
</p>
	   <p>&Uacute;ltimo Ingreso: <?php echo $this->_tpl_vars['ultimoingreso']; ?>
</p>
	  </div>
	  <!-- fin tab info -->
	  <div class="tab-page" id="desafios-page">
	    <h2 class="tab">Cursos</h2>
	    <?php echo '
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "desafios-page" ) );
	    </script>
	    '; ?>

	    <table class="adminlist">
		    <tr>
		      <th class="title">Id</th>
		      <th class="title">Curso</th>
		    </tr>
	    <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['cursos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
            <tr><td><?php echo $this->_tpl_vars['cursos'][$this->_sections['row']['index']]['id']; ?>
</td><td><?php echo $this->_tpl_vars['cursos'][$this->_sections['row']['index']]['curso']; ?>
</td></tr>
	    <?php endfor; else: ?>
		    <tr>
		      <td colspan="2">No se han asignado cursos </td>
		    </tr>
	    <?php endif; ?>
	  </div>
		   </div><!-- cierre pestañas -->
		</td>
	</tr>
</table>
</div>
</div>