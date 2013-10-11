<?php /* Smarty version 2.6.26, created on 2011-10-18 15:37:55
         compiled from encuestas/encuestasBasicReport.tpl */ ?>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/popup.js" type="text/javascript"></script>  	
'; ?>

<div align="center" class="centermain"> 
	<div class="main">
		<table class="adminheading">
		    <tr>
		      <th class="questsnew">
				<?php echo $this->_tpl_vars['titulo']; ?>

		      </th>
		    </tr>
		</table>
		<table cellspacing="0" cellpadding="0" width="100%">
		  <tr>
		    <td width="50%" valign="top">
		      <table width="100%" class="adminform">
		        <tr>
		          <td>
		            <?php echo $this->_tpl_vars['data_res']; ?>

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

			         <table width="100%" class="adminform">
				        <tr>
				          <th colspan="2">Detalles</th>
					     </tr>
					     <tr>
				          <td>Fecha de Creaci&oacute;n: </td>
				          <td><?php echo $this->_tpl_vars['fecha']; ?>
</td>
					     </tr>
					     <tr>
				          <td>Creada por: </td>
				          <td><?php echo $this->_tpl_vars['usuario']; ?>
</td>
					     </tr>
					     <tr>
				          <td>Personas encuestadas: </td>
				          <td><?php echo $this->_tpl_vars['total_resp']; ?>
</td>
					     </tr>
					  </table>
				  </div>
				 <!-- fin tab +info -->
			  </div><!-- cierre tabs -->
		    </td>
		  </tr>
		</table>
	</div>
</div><br></br>