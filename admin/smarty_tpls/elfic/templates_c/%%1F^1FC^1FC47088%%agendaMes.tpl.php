<?php /* Smarty version 2.6.26, created on 2011-05-06 16:00:29
         compiled from agenda/agendaMes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'agenda/agendaMes.tpl', 155, false),)), $this); ?>
<?php echo '
	<!-- <script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>-->
	<script src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js" type="text/javascript"></script> 
	<script src="js/popup.js" type="text/javascript"></script>
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		$("#adminForm").validate();
		});
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
      <th class="agenda">
		Agenda Mensual: <?php echo $this->_tpl_vars['fecha']; ?>

		<center>  
        <div id="button"><input type="submit" value="Agregar Evento" /></div>  
    </center>  
      </th>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
            <?php echo $this->_tpl_vars['cal']; ?>

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

	         <div id="eventdisplay">
	         	Haga click sobre un evento en el calendario para visualizar los detalles.
	         </div>
		  </div>
		 <!-- fin tab +info -->
	  </div><!-- cierre tabs -->
    </td>
  </tr>
</table>
</div>
</div><br></br>
<div id="popupContact">  
        <a id="popupContactClose">x</a>  
        <h1>Nuevo Evento</h1>  
        <p id="contactArea">  
            <form name="adminForm" id="adminForm" action="index2.php?com=agenda&do=addevent" method="post">
            <table class="adminlist">
               <tr>
                   <td class="headlines">Titulo: </td><td><input type="text" id="titulo" name="titulo" class="required" ></td>
               </tr>
               <tr>
                   <td class="headlines">Descripción: </td><td>
                       <textarea id="descrip" name="descrip" class="required" class="mceEditor"></textarea></td>
               </tr>
               <tr>
				  <td class="headlines">Fecha inicio</td>
				  <td>
				      <input name="fechaini" type="text" id="fechaini" size="10" maxlength="10" class="required dateISO" />
					  <input type="reset" value="..." onClick="return showCalendar('fechaini', '%Y-%m-%d', '24', true);" />
				  </td>
			   </tr>
			   <tr>
				  <td class="headlines">Fecha final</td>
				  <td>
				      <input name="fechafin" type="text" id="fechafin" size="10" maxlength="10" class="required dateISO" />
					  <input type="reset" value="..." onClick="return showCalendar('fechafin', '%Y-%m-%d', '24', true);" />
				  </td>
			   </tr>
			   <tr>
                   <td class="headlines">Tipo: </td>
                   <td>
                       <select name="tipo" id="tipo" class="required">
				        <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tipo']), $this);?>

			           </select>
                   </td>
               </tr>
			   <tr>
                   <td class="headlines">Lugar: </td><td><input type="text" id="lugar" name="lugar" class="required" ></td>
               </tr>
               <tr>
                   <td><input type="hidden" name="do_save" value="do" /><input type="submit" name="Submit" value="Enviar" /></td><td></td>
               </tr>
            </table>
            
            </form>
    </div>  
    <div id="backgroundPopup"></div>  