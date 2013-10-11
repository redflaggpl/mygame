<?php /* Smarty version 2.6.26, created on 2011-05-06 15:18:17
         compiled from usuarios/usuarioEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'usuarios/usuarioEdit.tpl', 136, false),)), $this); ?>
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
'; ?>

<?php echo '
    <script language="javascript" type="text/javascript">
    

    // This function gets called when the end-user clicks on some date.
    function selected(cal, date) {
	cal.sel.value = date; // just update the date in the input field.
	if (cal.dateClicked && cal.sel.id == "nonexistent")
	// if we add this call we close the calendar on single-click.
	// just to exemplify both cases, we are using this only for the 1st
	// and the 3rd field, while 2nd and 4th will still require double-click.
	cal.callCloseHandler();
    }

    // And this gets called when the end-user clicks on the _selected_ date,
    // or clicks on the "Close" button.  It just hides the calendar without
    // destroying it.
    function closeHandler(cal) {
	cal.hide();                        // hide the calendar
	//  cal.destroy();
	_dynarch_popupCalendar = null;
    }

    // This function shows the calendar under the element having the given id.
    // It takes care of catching "mousedown" signals on document and hiding the
    // calendar if the click was outside.
    function showCalendar(id, format, showsTime, showsOtherMonths) {
	var el = document.getElementById(id);
	if (_dynarch_popupCalendar != null) {
	    // we already have some calendar created
	    _dynarch_popupCalendar.hide();                 // so we hide it first.
	} else {
	    // first-time call, create the calendar.
	    var cal = new Calendar(1, null, selected, closeHandler);
	    // uncomment the following line to hide the week numbers
	    // cal.weekNumbers = false;
	    if (typeof showsTime == "string") {
		cal.showsTime = true;
		cal.time24 = (showsTime == "24");
	    }
	    if (showsOtherMonths) {
		cal.showsOtherMonths = true;
	    }
	    _dynarch_popupCalendar = cal;                  // remember it in the global var
	    cal.setRange(1900, 2070);        // min/max year allowed.
	    cal.create();
	}
	_dynarch_popupCalendar.setDateFormat(format);    // set the specified date format
	_dynarch_popupCalendar.parseDate(el.value);      // try to parse the text in field
	_dynarch_popupCalendar.sel = el;                 // inform it what input field we use

	// the reference element that we pass to showAtElement is the button that
	// triggers the calendar.  In this example we align the calendar bottom-right
	// to the button.
	_dynarch_popupCalendar.showAtElement(el, "Br");        // show the calendar

	return false;
    }
    </script>
    '; ?>


<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>

      <th class="usersnew">
	      Edición de Usuario <?php echo $this->_tpl_vars['login']; ?>
 
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
            <td class="headlines">Tipo de documento</td>
             <td>
              	<select name="tipdoc" id="tipdoc" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tipdoc'],'selected' => $this->_tpl_vars['seltipdoc']), $this);?>

					</select> 
              </td>
              <td  class="headlines">Nº Documento</td>
              <td><?php echo $this->_tpl_vars['uid']; ?>
</td>
            <tr>
              <td class="headlines">Primer Nombre</td>
              <td><input name="prinom" type="text" id="prinom" size="30" 
                  maxlength="20" class="required" value="<?php echo $this->_tpl_vars['prinom']; ?>
"/></td>
              <td class="headlines">Segundo Nombre</td>
              <td><input name="segnom" type="text" id="segnom" size="30" 
                  maxlength="20" value="<?php echo $this->_tpl_vars['segnom']; ?>
"/></td>
            </tr>
            <tr>
              <td class="headlines">Primer Apellido</td>
              <td><input name="priape" type="text" id="priape" size="30" 
                  maxlength="20" class="required" value="<?php echo $this->_tpl_vars['priape']; ?>
"/></td>
              <td class="headlines">Segundo Apellido</td>
              <td><input name="segape" type="text" id="segape" size="30" 
                  maxlength="20"  value="<?php echo $this->_tpl_vars['segape']; ?>
"/></td>
            </tr>
            <tr>
              <td class="headlines">Dirección</td>
              <td><input name="direccion" type="text" id="direccion" size="30" 
                  maxlength="70"  value="<?php echo $this->_tpl_vars['direccion']; ?>
"/></td>
              <td class="headlines">Fecha Nacimiento</td>
              <td>
                  <input name="fecnac" type="text" id="fecnac" size="10" value="<?php echo $this->_tpl_vars['fecnac']; ?>
" maxlength="10"  />
			      <input type="reset" value="..." onClick="return showCalendar('fecnac', '%Y-%m-%d', '24', true);" />
				  
              </td>
            </tr>
            <tr>
            <td class="headlines">Tipo de persona</td>
             <td>
              	<select name="tippers" id="tippers" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tippers'],'selected' => $this->_tpl_vars['seltippers']), $this);?>

					</select> 
              </td>
               <td class="headlines">Login</td>
              <td><input name="login" type="text" id="login" size="30" maxlength="50" 
                  class="required" value="<?php echo $this->_tpl_vars['login']; ?>
"></td>
            </tr>
            <tr>
              <td class="headlines">Email</td>
              <td><input name="email" type="text" id="email" size="30" maxlength="50" 
                  class="required email" value="<?php echo $this->_tpl_vars['email']; ?>
"></td>
              <td class="headlines">Perfil</td>
              <td>
              	<select name="perfil" id="perfil" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['perfil'],'selected' => $this->_tpl_vars['selperfil']), $this);?>

					</select> 
              </td>
            </tr>
            <tr>
              <td class="headlines">Activo</td>
              <td>
              	<select name="activo" id="activo" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['activo'],'selected' => $this->_tpl_vars['selactivo']), $this);?>

					</select> 
              </td>
              <td ></td>
              <td ></td>
            </tr>
            <tr>
              <td class="headlines">
              	<input type="hidden" name="do_edit" value="do" />
              	<input type="hidden" name="uid" value="<?php echo $this->_tpl_vars['uid']; ?>
" />
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

	   <p>Fecha de Creación: <?php echo $this->_tpl_vars['registerDate']; ?>
</p>
	   <p>Último Ingreso: <?php echo $this->_tpl_vars['lastvisitDate']; ?>
</p>
	  </div>
	  <!-- fin tab info -->
	  <!--  inicio tab permisos -->
	  <div class="tab-page" id="permisos-page">
	    <h2 class="tab">Permisos</h2>
	    <?php echo '
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "permisos-page" ) );
	    </script>
	    '; ?>

	  </div>
		 <!-- fin tab permisos -->
		
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