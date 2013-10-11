{literal}
	<script src="js/popup.js" type="text/javascript"></script>  	
{/literal}
{literal}
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
    {/literal}
<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <th class="agenda">
		Semana
      </th>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
            {$cal}
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
		<!-- incia tab +info -->
	      <div class="tab-page" id="info-page">
	       <h2 class="tab">+ Info</h2>
	         {literal}
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "info-page" ) );
	           </script>
	         {/literal}
	         Info acerca de la creación de eventos
		  </div>
		 <!-- fin tab +info -->
	  </div><!-- cierre tabs -->
    </td>
  </tr>
</table>
</div>
</div><br></br>