<?php /* Smarty version 2.6.26, created on 2011-10-18 20:52:50
         compiled from reportes/encuestasBasicReportPrint.tpl */ ?>
<div align="center" class="centermain"> 
	<div class="main">
	    <table >
		    <tr>
		      <td >
				<h3><?php echo $this->_tpl_vars['titulo']; ?>
</h3>
		      </td>
		    </tr>
		</table>
		<table >
		    <tr>
				<td><strong>Fecha de Creaci&oacute;n: </strong></td>
				<td><?php echo $this->_tpl_vars['fecha']; ?>
</td>
			</tr>
			<tr>
				<td><strong>Personas encuestadas: </strong></td>
				<td><?php echo $this->_tpl_vars['total_resp']; ?>
</td>
			</tr>
		</table>
		<br>
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
		  </tr>
		</table>
	</div>
</div><br></br>