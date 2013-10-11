<?php /* Smarty version 2.6.26, created on 2011-01-13 10:02:53
         compiled from usuarioEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'usuarioEdit.tpl', 137, false),array('function', 'cycle', 'usuarioEdit.tpl', 191, false),)), $this); ?>
<?php echo '
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
	<script type="text/javascript">
	function dedupe_list()
	{
		var count = 0;
		var campo_it = document.form1.campo_it.value;
		campo_it = campo_it.replace(/\\r/gi, "\\n");
		campo_it = campo_it.replace(/\\n+/gi, "\\n");
		
		var listvalues = new Array();
		var newlist = new Array();
		
		listvalues = campo_it.split("\\n");
		
		var hash = new Object();
		
		for (var i=0; i<listvalues.length; i++)
		{
			if (hash[listvalues[i].toLowerCase()] != 1)
			{
				newlist = newlist.concat(listvalues[i]);
				hash[listvalues[i].toLowerCase()] = 1
			}
			else { count++; }
		}
		document.adminForm.campo_it.value = newlist.join("\\r\\n");
		//alert(\'Eliminados \' + count + \' valores duplicados de la lista.\');
	}

	oldvalue = "";
	function passText(passedvalue) {
	  if (passedvalue != "") {
	    var totalvalue = passedvalue+"\\n"+oldvalue;
	    document.adminForm.campo_it1.value = totalvalue;
	    oldvalue = document.adminForm.campo_it1.value;
	  }
	}
	</script>
'; ?>


  <?php echo '
  <link rel="stylesheet" href="js/jquery.superbox.css" type="text/css" media="all" />
  <!--  <script type="text/javascript" src="js/jquery.superbox-min.js"></script> -->
  <script type="text/javascript" src="js/jquery.superbox.js"></script>
  <script type="text/javascript"> 
		$(function(){
			$.superbox.settings = {
				closeTxt: "Cerrar",
				loadTxt: "Cargando...",
				nextTxt: "Next",
				prevTxt: "Previous"
			};
			$.superbox();
		});
	</script> 
  '; ?>

<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>

      <th class="newproc">
	<?php echo $this->_tpl_vars['username']; ?>

      </th>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
         <form name="adminForm" id="adminForm" method="post" action="index2.php?com=usuarios&do=view&uid=<?php echo $this->_tpl_vars['id']; ?>
">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <th colspan="6">Datos del Usuario</th>
            </tr>
            <tr>
              <td class="headlines">Nombre</td>
              <td><input name="name" type="text" id="name" size="30" maxlength="255" class="required" value="<?php echo $this->_tpl_vars['name']; ?>
"/></td>
              <td class="headlines">Usuario (login)</td>
              <td><input name="username" type="text" id="username" size="30" maxlength="100" class="required" value="<?php echo $this->_tpl_vars['username']; ?>
"/></td>
            </tr>
            <tr>
              <td class="headlines">Email</td>
              <td><input name="email" type="text" id="email" size="30" maxlength="50" class="required email" value="<?php echo $this->_tpl_vars['email']; ?>
"></td>
              <td class="headlines">Bloqueado</td>
              <td>
              	<select name="block" id="block" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['blockvalues'],'selected' => $this->_tpl_vars['block']), $this);?>

					</select> 
              </td>
            </tr>
            <tr>
              <td class="headlines">
              	<input type="hidden" name="do_edit" value="do" />
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
	  <?php echo '
	  <script type="text/javascript">
	    var tabPane1 = new WebFXTabPane( document.getElementById( "pdetails-pane" ), 1 );
	  </script>
	  '; ?>

	  <!--  inicio tab info -->
	  <div class="tab-page" id="info-page">
	    <h2 class="tab">Infromación</h2>
	    <?php echo '
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "info-page" ) );
	    </script>
	    '; ?>

	   
	  </div>
	  <!-- fin tab info -->
	  <!--  inicio tab grupos -->
	  <div class="tab-page" id="grupos-page">
	    <h2 class="tab">Grupos</h2>
	    <?php echo '
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "grupos-page" ) );
	    </script>
	    '; ?>

	    <div id="socialinf">
	   		<!-- <table class="adminlist">
	    	<tr>
	    	    <th>#</th>
	    	    <th>Id</th>
	    	    <th>Grupo</th>
	    	</tr>
		    <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['grupos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		    <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#f4f4f4,#e8e8e8"), $this);?>
">
		   	    <td><?php echo $this->_sections['row']['iteration']; ?>
</td>
				<td><?php echo $this->_tpl_vars['grupos'][$this->_sections['row']['index']]['id']; ?>
</td>
				<td><?php echo $this->_tpl_vars['grupos'][$this->_sections['row']['index']]['nombre']; ?>
</td>
		    </tr>
		    <?php endfor; else: ?>
		    <tr>
		      <td colspan="4">El usuario no pertenece a ningún grupo</td>
		    </tr>
		   <?php endif; ?>
		   </table> -->
		   <div id="msggrupos"></div>
		   <?php echo $this->_tpl_vars['grupos']; ?>

		   </div>
		 </div>
		 <!-- fin tab grupos -->
		<!--  inicio tab municipios -->
	  <div class="tab-page" id="grupos-page">
	    <h2 class="tab">Municipios</h2>
	    <?php echo '
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "municipios-page" ) );
	    </script>
	    '; ?>

	    <div class="actionsbar">
	    	<div class="info_msg">
	    		Agregue municipios a un usuario:
	    		Solo para usuarios administradores de municipios
	    	</div>
	    	<form name="adminForm2" 
	    		id="adminForm2" method="post" 
	    		action="index2.php?com=usuarios&do=addmun&uid=<?php echo $this->_tpl_vars['id']; ?>
">
		    	<select name="id_municipios_cats" id="id_municipios_cats" class="required">
					<option value="">--Seleccione--</option>
			  		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['mun_combo']), $this);?>

				</select>
				<input type="submit" name="Submit" value="Enviar" />
            </form>
	    </div>
	    <div id="socialinf">
	    <table class="adminlist">
	    	<tr>
	    	    <th>#</th>
	    	   <th>Municipio</th>
	    	   <th>Borrar</th>
	    	</tr>
		    <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['m']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		    <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#f4f4f4,#e8e8e8"), $this);?>
">
		   	    <td><?php echo $this->_sections['row']['iteration']; ?>
</td>
				<td><?php echo $this->_tpl_vars['m'][$this->_sections['row']['index']]['nombre']; ?>
</td>
				<td><a href="index2.php?com=usuarios&do=delmun&mid=<?php echo $this->_tpl_vars['m'][$this->_sections['row']['index']]['id_municipios_cats']; ?>
&uid=<?php echo $this->_tpl_vars['id']; ?>
">
					<img src="cancel.png"></img>
					</a>
				</td>
		    </tr>
		    <?php endfor; else: ?>
		    <tr>
		      <td colspan="4">El usuario no esta asociado a ningún municipio</td>
		    </tr>
		   <?php endif; ?>
		   </table>
		   </div>
		 </div>
		 <!-- fin tab grupos -->
		   <div class="tab-page" id="budget-page">
		    <h2 class="tab">Contraseña</h2>
		    <?php echo '
		    <script type="text/javascript">
		      tabPane1.addTabPage( document.getElementById( "passwd-page" ) );
		    </script>
		    '; ?>

		    <table width="100%" class="adminform">
        <tr>
          <td>
          <form name="adminForm2" id="adminForm2" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>
?com=usuarios&do=chpass&uid=<?php echo $this->_tpl_vars['id']; ?>
"> 
	      	<table width="100%" cellspacing="0" cellpadding="0">
	            <tr>
	              <th colspan="6">Contraseña</th>
	            </tr>
	            <tr>
	              <td><label for="password">Contraseña</label></td>
	              <td><input id="password" name="password" type="password" /> </td>
	              <td></td>
	              <td></td>
	            </tr>
	            <tr>
	              <td><label for="confirm_password">Confirmar Contraseña</label> </td>
	              <td><input id="confirm_password" name="confirm_password" type="password" equalTo="#password"/></td>
	              <td></td>
	              <td></td>
	            </tr>
	           	<tr>
	              <td><input type="hidden" name="uid" value="<?php echo $this->_tpl_vars['uid']; ?>
" /></td>
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