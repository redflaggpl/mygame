<?php /* Smarty version 2.6.26, created on 2011-05-02 11:32:50
         compiled from comunicados/comunicadosNew.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_checkboxes', 'comunicados/comunicadosNew.tpl', 181, false),array('function', 'html_options', 'comunicados/comunicadosNew.tpl', 209, false),array('function', 'cycle', 'comunicados/comunicadosNew.tpl', 245, false),)), $this); ?>
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
<script type="text/javascript">

var numero = 0;



// Funciones comunes

c= function (tag) { // Crea un elemento

   return document.createElement(tag);

}

d = function (id) { // Retorna un elemento en base al id

   return document.getElementById(id);

}

e = function (evt) { // Retorna el evento

   return (!evt) ? event : evt;

}

f = function (evt) { // Retorna el objeto que genera el evento

   return evt.srcElement ?  evt.srcElement : evt.target;

}



addField = function () {

   container = d(\'files\');
   span = c(\'SPAN\');
   span.className = \'file\';
   span.id = \'file\' + (++numero);
   field = c(\'INPUT\');   
   field.name = \'archivos[]\';
   field.type = \'file\';
   a = c(\'A\');
   a.name = span.id;
   a.href = \'#\';
   a.onclick = removeField;
   a.innerHTML = \'Quitar\';
   span.appendChild(field);
   span.appendChild(a);
   container.appendChild(span);
}

removeField = function (evt) {

   lnk = f(e(evt));
   span = d(lnk.name);
   span.parentNode.removeChild(span);

}
</script>

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
            <form name="adminForm" id="adminForm" 
                  enctype="multipart/form-data" 
                  method="post" action="index2.php?com=comunicados&do=new">
 			  <table width="100%" cellspacing="0" cellpadding="0">
			    <tr>
				  <th colspan="6">Nuevo Mensaje</th>
				</tr>
				<tr>
				   <td class="headlines" valign="top">Asunto</td>
				   <td><input name="asunto" type="text" id="asunto" size="30" maxlength="90" class="required" value=""/></td>
				   <td></td>
				   <td></td>
				</tr>
				<tr>
					<td class="headlines" valign="top">Adjuntos</td>
				    <td valign="top">
				       <a href="#" onclick="addField()" accesskey="5" class="actionattach">Añadir Archivo</a>
				       <div id="files"></div>
				    </td>
				    <td></td>
				    <td></td>
				</tr>
				<tr>
					<td class="headlines">Para</td>
					<td><!-- <?php echo smarty_function_html_checkboxes(array('name' => 'dests','options' => $this->_tpl_vars['destinatarios'],'separator' => '<br />'), $this);?>
 -->
					    <div id="button"><a href="#" class="actionnew">Agregar Destinatarios</a></div>
					</td>
					<td></td>
					<td></td>
				<tr>
				  <td class="headlines" colspan="4">Mensaje</td>
				</tr>
				<tr>
				  <td colspan="4">
				    <textarea name="mensaje" id="mensaje" class="mceEditor"></textarea>
				  </td>
				</tr>
				<tr>
				  <td class="headlines">Fecha venvimiento</td>
				  <td>
				      <input name="fecvence" type="text" id="fecvence" size="10" maxlength="10" class="required dateISO" />
					  <input type="reset" value="..." onClick="return showCalendar('fecvence', '%Y-%m-%d', '24', true);" />
				  </td>
				  <td class="headlines"></td>
				  <td>
				  </td>
				</tr>
				<tr>
				   <td class="headlines">Categoría</td>
				   <td>
				       <select name="categoria" id="categoria" class="required">
				        <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['cats']), $this);?>

			           </select>
				   </td>
				   <td class="headlines">Tipo</td>
				   <td>
				   	 <select name="tipmens" id="tipmens" class="required">
				        <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tipos']), $this);?>

			           </select>
				   </td>
				</tr>
			     <tr>
			       <td>
			         <input type="hidden" id="do_save" name="do_save" value="do">
			         <input type="hidden" id="documto_id" name="documto_id" value="<?php echo $this->_tpl_vars['uid']; ?>
">
			       </td>
			       <td>
			           <input type="submit" name="Submit" value="Enviar" />
			           <input type="button" name="Cancelar" value="Cancelar"
			               onClick="location.href='index2.php?com=comunicados'"></td>
			       <td></td>
			       <td>&nbsp;</td>
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
	                           <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['dest_est']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								    <td><input type="checkbox" id="cb<?php echo $this->_sections['row']['index']; ?>
" 
								                name="dest_est[<?php echo $this->_sections['row']['index']; ?>
]"
										        value="<?php echo $this->_tpl_vars['dest_est'][$this->_sections['row']['index']]['documto_id']; ?>
" /></td>
								    <td><?php echo $this->_tpl_vars['dest_est'][$this->_sections['row']['index']]['fullname']; ?>
</td>
								</tr>
							    <?php endfor; endif; ?>
							    </table>
							    </td>
							    <td valign="top">
							    	<table>
							    	<?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['dest_prof']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
									    <td><input type="checkbox" id="cb2-<?php echo $this->_sections['row']['index']; ?>
" 
									                name="dest_prof[<?php echo $this->_sections['row']['index']; ?>
]"
											        value="<?php echo $this->_tpl_vars['dest_prof'][$this->_sections['row']['index']]['documto_id']; ?>
" /></td>
									    <td><?php echo $this->_tpl_vars['dest_prof'][$this->_sections['row']['index']]['fullname']; ?>
</td>
								    </tr>
							    <?php endfor; endif; ?>
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