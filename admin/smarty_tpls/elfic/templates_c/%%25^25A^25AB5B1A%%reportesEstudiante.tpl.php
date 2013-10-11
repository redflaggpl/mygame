<?php /* Smarty version 2.6.26, created on 2012-06-02 11:54:31
         compiled from reportes/reportesEstudiante.tpl */ ?>
<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <td class="estudiantes">
		<h2><?php echo $this->_tpl_vars['estudiante']; ?>
 - <?php echo $this->_tpl_vars['institucion']; ?>
</h2>
      </td>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="50%" valign="top">
      <table width="100%" class="adminform">
      	<tr>
			<td>Curso</td><td><?php echo $this->_tpl_vars['curso']; ?>
</td>
		</tr>
		<tr>
		    <td>Máximo desafio aprobado</td><td><?php echo $this->_tpl_vars['md']; ?>
</td>
		</tr>
		<tr>
		    <td>Máximo desafio en último juego</td><td><?php echo $this->_tpl_vars['umd']; ?>
</td>
		</tr>
		<tr>
		    <td>Nivel</td><td><?php echo $this->_tpl_vars['nivel']; ?>
</td>
		</tr>
		<tr>
		    <td>Subnivel</td><td><?php echo $this->_tpl_vars['subnivel']; ?>
</td>
		</tr>
      </table>
    
	  </td>
      <td width="1%">&nbsp;</td>
      	<td width="49%" valign="top">
			<?php echo $this->_tpl_vars['torta']; ?>

		</td>
	</tr>
</table>
</div>
</div>
<div align="center" class="centermain"> 
	<div class="main">
		<table class="adminheading">
			<tr>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>
			
		</table>
	</div>
</div>