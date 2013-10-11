<?php /* Smarty version 2.6.26, created on 2011-01-08 10:44:43
         compiled from eventoNew.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'eventoNew.tpl', 153, false),)), $this); ?>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#adminForm").validate({ 
				rules: {
					urlfoto: { /*id del campo que se aplica la regla*/
					accept: "jpg|png" /*extensiones aceptadas*/
					}
				}
			});
		});
	</script>
	<script src="js/popup.js" type="text/javascript"></script>  	
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
      <th class="newproc">
		<?php echo $this->_tpl_vars['nombre']; ?>

      </th>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
            <form name="adminForm" id="adminForm" enctype="multipart/form-data" method="post" action="index2.php?com=eventos&do=new">
 			  <table width="100%" cellspacing="0" cellpadding="0">
			    <tr>
				  <th colspan="6">Datos de básicos del Evento</th>
				</tr>
				<tr>
				  <td class="headlines">Nombre</td>
				   <td><input name="nombre" type="text" id="nombre" size="30" maxlength="255" class="required" value=""/></td>
				   <td class="headlines">Foto</td>
				   <td><input name="urlfoto" type="file" id="urlfoto" size="12" maxlength="120" class="required" value=""></td>
				</tr>
				<tr>
				  <td class="headlines" colspan="4">Información</td>
				</tr>
				<tr>
				  <td colspan="4">
				    <textarea name="informacion" id="informacion" class="mceEditor"></textarea>
				  </td>
				</tr>
				<tr>
				  <td class="headlines" colspan="4">Programación</td>
				</tr>
				<tr>
				   <td colspan="4">
				     <textarea name="programacion" id="programacion" class="mceEditor"></textarea>
				   </td>
				</tr>
				<tr>
				  <td class="headlines" colspan="4">Stands</td>
				</tr>
				<tr>
				   <td colspan="4">
				     <textarea name="stands" id="stands" class="mceEditor"></textarea>
				   </td>
				</tr>
				<tr>
				  <td class="headlines" colspan="4">Info contacto</td>
				</tr>
				<tr>
				   <td colspan="4">
				     <textarea name="info_contacto" id="info_contacto" class="mceEditor"></textarea>
				   </td>
				</tr>
				<tr>
				  <td class="headlines">Fecha inicio</td>
				  <td>
				      <input name="fecha_ini" type="text" id="fecha_ini" size="10" maxlength="10" class="required dateISO" />
					  <input type="reset" value="..." onClick="return showCalendar('fecha_ini', '%Y-%m-%d', '24', true);" />
				  </td>
				  <td class="headlines">Fecha fin</td>
				  <td>
				  	  <input name="fecha_fin" type="text" id="fecha_fin" size="10" maxlength="10" class="required dateISO" />
					  <input type="reset" value="..." onClick="return showCalendar('fecha_fin', '%Y-%m-%d', '24', true);" />
				   </td>
				</tr>
			    <tr>
			       <td class="headlines">Publicado</td>
			       <td>
			          <select name="publicado" id="publicado" class="required">
			            <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['publicado'],'selected' => $this->_tpl_vars['sel_publicado']), $this);?>

			          </select>
			       </td>
			       <td class="headlines">Municipio</td>
			       <td>
			       		<select name="id_municipios_cats" id="id_municipios_cats" class="required">
			            <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['municipios']), $this);?>

			          </select>
			       </td>
			     </tr>
			     <tr>
			       <td>
			         <input type="hidden" id="do_save" name="do_save" value="do">
			       </td>
			       <td><input type="submit" name="Submit" value="Enviar" /> <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=municipios'"></td>
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

		<!-- incia tab +info -->
	      <div class="tab-page" id="info-page">
	       <h2 class="tab">+ Info</h2>
	         <?php echo '
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "info-page" ) );
	           </script>
	         '; ?>

	         Info acerca de la creación de eventos
		  </div>
		 <!-- fin tab +info -->
	  </div><!-- cierre tabs -->
    </td>
  </tr>
</table>
</div>
</div><br></br>