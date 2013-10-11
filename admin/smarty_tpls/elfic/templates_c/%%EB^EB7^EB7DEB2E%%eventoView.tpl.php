<?php /* Smarty version 2.6.26, created on 2011-01-13 09:42:19
         compiled from eventoView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'eventoView.tpl', 148, false),)), $this); ?>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    	$("#adminForm").validate();
    	$("#adminForm3").validate();
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
            <form name="adminForm" id="adminForm" method="post" action="index2.php?com=eventos&do=edit&eid=<?php echo $this->_tpl_vars['eid']; ?>
">
 			  <table width="100%" cellspacing="0" cellpadding="0">
			    <tr>
				  <th colspan="6">Datos de básicos del Evento</th>
				</tr>
				<tr>
				  <td class="headlines">Nombre</td>
				   <td><input name="nombre" type="text" id="nombre" size="30" maxlength="255" class="required" value="<?php echo $this->_tpl_vars['nombre']; ?>
"/></td>
				   <td class="headlines">Foto</td>
				   <td><input name="urlfoto" type="text" id="urlfoto" size="12" maxlength="30" class="" value="<?php echo $this->_tpl_vars['urlfoto']; ?>
" readonly="true"></td>
				</tr>
				<tr>
				  <td class="headlines" colspan="4">Información</td>
				</tr>
				<tr>
				  <td colspan="4">
				    <textarea name="informacion" id="informacion" class="mceEditor"><?php echo $this->_tpl_vars['informacion']; ?>
</textarea>
				  </td>
				</tr>
				<tr>
				  <td class="headlines" colspan="4">Programación</td>
				</tr>
				<tr>
				   <td colspan="4">
				     <textarea name="programacion" id="programacion" class="mceEditor"><?php echo $this->_tpl_vars['programacion']; ?>
</textarea>
				   </td>
				</tr>
				<tr>
				  <td class="headlines" colspan="4">Stands</td>
				</tr>
				<tr>
				   <td colspan="4">
				     <textarea name="stands" id="stands" class="mceEditor"><?php echo $this->_tpl_vars['stands']; ?>
</textarea>
				   </td>
				</tr>
				<tr>
				  <td class="headlines" colspan="4">Info contacto</td>
				</tr>
				<tr>
				   <td colspan="4">
				     <textarea name="info_contacto" id="info_contacto" class="mceEditor"><?php echo $this->_tpl_vars['info_contacto']; ?>
</textarea>
				   </td>
				</tr>
				<tr>
				  <td class="headlines">Fecha inicio</td>
				  <td>
				      <input name="fecha_ini" type="text" id="fecha_ini" size="10" maxlength="10" class="required dateISO" value="<?php echo $this->_tpl_vars['fecha_ini']; ?>
"/>
					  <input type="reset" value="..." onClick="return showCalendar('fecha_ini', '%Y-%m-%d', '24', true);" />
				  </td>
				  <td class="headlines">Fecha fin</td>
				  <td>
				  	  <input name="fecha_fin" type="text" id="fecha_fin" size="10" maxlength="10" value="<?php echo $this->_tpl_vars['fecha_fin']; ?>
" class="required dateISO" />
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
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['municipios'],'selected' => $this->_tpl_vars['sel_municipio']), $this);?>

			          </select>
			       </td>
			     </tr>
			     <tr>
			       <td>
			         <input type="hidden" id="do_edit" name="do_edit" value="do">
			       </td>
			       <td><input type="submit" name="Submit" value="Enviar" /> <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=eventos'"></td>
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

		 <!-- incia tab media -->
	      <div class="tab-page" id="media-page">
	       <h2 class="tab">Imágenes</h2>
	         <?php echo '
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "media-page" ) );
	           </script>
	         '; ?>

			 	<div id="media_upload">
					<form name="adminForm2" id="adminForm2" method="POST" enctype="multipart/form-data" action="index2.php?com=eventos&do=img_upload">
					<table width="100%">
					    <tr>
						  <td>
							Archivo: <input type="file" size="20" maxlength="120" name="urlfoto" id="urlfoto" value="" class="required accept" />
						  </td>
					    </tr>
					    <tr>
						 <td colspan="3">
						 <input name="eid" type="hidden" id="eid" value="<?php echo $this->_tpl_vars['eid']; ?>
" />
						 <input type="hidden" name="img_up" id="img_up" value="yes"/>
						 <input name="cargar" type="submit" id="cargar" value="Subir" >
						 </td>
					    </tr>
					 </table>
				   </form>
				</div>
			 	<div id="media_box">
					<?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['media']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				  <div id='image_box'>
					<img src='<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['path']; ?>
/<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
' 
					width="80" height="60"	name="<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
" 
					onClick="cambiar('<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
')">
					<div id='img_name'><?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
</div>
					<a href="index2.php?com=eventos&do=img_del&eid=<?php echo $this->_tpl_vars['eid']; ?>
&img=<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
"><img src="images/remove.png"/></a>					</div>
					<?php endfor; else: ?>
							No hay sitios turísticos registrados para este evento
					<?php endif; ?>
		   		</div>
		  </div>
		 <!-- fin tab media-->
		 <!-- incia tab versiones -->
	      <div class="tab-page" id="versiones-page">
	       <h2 class="tab">Versiones</h2>
	         <?php echo '
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "versiones-page" ) );
	           </script>
	         '; ?>

	         <div id="tabcont">
	          <div class="actionsbar">
	    	    <div id="button"><a href="#" class="actionnew">Agregar versión anterior</a></div>
	   		 </div> 
	          <table class="adminlist">
	          <tr>
	          	<th>Título</th>
	          	<th>Publicación</th>
	          	<th>Edición</th>
	          	<th>Publicado</th>
	          	<th>Acciones</th>
	          </tr>
	         <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['blog']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			   <tr>
			   		<td><?php echo $this->_tpl_vars['blog'][$this->_sections['row']['index']]['titulo']; ?>
</td>
			   		<td><?php echo $this->_tpl_vars['blog'][$this->_sections['row']['index']]['fecha_publicacion']; ?>
</td>
			   		<td><?php echo $this->_tpl_vars['blog'][$this->_sections['row']['index']]['fecha_edicion']; ?>
</td>
			   		<td><?php echo $this->_tpl_vars['blog'][$this->_sections['row']['index']]['publicado']; ?>
</td>
			   		<td>
			   			<a href="index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
&do=updateentryblog&eb=<?php echo $this->_tpl_vars['blog'][$this->_sections['row']['index']]['id']; ?>
&eid=<?php echo $this->_tpl_vars['eid']; ?>
">Editar</a><br>
			   			<a href="index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
&do=delentryblog&eb=<?php echo $this->_tpl_vars['blog'][$this->_sections['row']['index']]['id']; ?>
&eid=<?php echo $this->_tpl_vars['eid']; ?>
" onclick="return confirm('¿Está seguro?');">Borrar</a>
					</td>
			    </tr>
			 <?php endfor; else: ?>
				    <tr>
			    		<td colspan="5">No se han registrado versiones anteriores del evento</td>
			    	</tr>
			 <?php endif; ?>
			</table>
	        </div>
		  </div>
		 <!-- fin tab blog -->
		<!-- incia tab +info -->
	      <div class="tab-page" id="info-page">
	       <h2 class="tab">+ Info</h2>
	         <?php echo '
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "info-page" ) );
	           </script>
	         '; ?>

	         Info de la creación de eventos
		  </div>
		 <!-- fin tab +info -->
	  </div><!-- cierre tabs -->
    </td>
  </tr>
</table>
</div>
</div><br></br>
<!-- ajax popup form entrada versiones anteriores -->
<div id="popupContact">
		<a href="#" id="popupContactClose">X</a>
		<div id="formpopup">
	    	<form name="adminForm3" id="adminForm3" method="post" action="index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
&do=newentryblog">
          		<table cellspacing="0" cellpadding="0" class="adminlist">
	    			<tr>
	    				<th colspan="2">Nueva entrada en Versiones Anteriores</th>
	    			</tr>
	    			<tr>
					  <td class="headlines">Titulo</td>
					  <td><input name="titulo" type="text" id="titulo" size="30" maxlength="255" class="required" value=""/></td>
					</tr>
					<tr>
					  <td class="headlines">Video (id youtube)</td>
					  <td><input name="url_video" type="text" id="url_video" size="30" maxlength="255" value=""/></td>
					</tr>
					<tr>
				   <td class="headlines" colspan="2">Contenido</td>
				 </tr>
				 <tr>
				   <td colspan="2">
				     <textarea name="contenido" id="contenido" class="mceEditor" ></textarea>
				   </td>
				 </tr>
				 <tr>
			       <td class="headlines">Publicado</td>
			       <td>
			          <select name="publicado" id="publicado" class="required">
			            <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['publicado']), $this);?>

			          </select>
			       </td>
			     </tr>
	    		 <tr>
			            <td colspan="2">
			            <input type="hidden" name="id_eventos" id="id_eventos" value="<?php echo $this->_tpl_vars['eid']; ?>
"></input>
			            <input type="submit" name="Submit" value="Enviar" />
			            </td>
	    			</tr>
	    		</table>
	    	</form>
	    </div> 
	</div>
	<div id="backgroundPopup"></div>
	<!--  fin ajax popup form crear produccion -->