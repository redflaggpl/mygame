<?php /* Smarty version 2.6.26, created on 2011-05-06 15:50:03
         compiled from agenda/agendaDia.tpl */ ?>
<?php echo '
	<script src="js/popup.js" type="text/javascript"></script> 
	<script src="js/ajax.js" type="text/javascript"></script>
'; ?>

<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <th class="agenda">
		 <?php echo $this->_tpl_vars['fecha']; ?>

      </th>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
            <div id="eventlist"><?php echo $this->_tpl_vars['events']; ?>
</div>
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
	       <h2 class="tab">Detalle</h2>
	         <?php echo '
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "info-page" ) );
	           </script>
	         '; ?>

	         <div id="eventdisplay">
	         	Haga click sobre un evento para ver su descripción detallada.
	         </div>
		  </div>
		 <!-- fin tab +info -->
	  </div><!-- cierre tabs -->
    </td>
  </tr>
</table>
</div>
</div><br></br>