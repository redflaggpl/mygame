<?php /* Smarty version 2.6.26, created on 2011-01-13 10:17:58
         compiled from eventoAnteriorView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'eventoAnteriorView.tpl', 52, false),)), $this); ?>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    	$("#adminForm").validate();
		});
	</script>
'; ?>

<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <th class="newproc">
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
            <form name="adminForm" id="adminForm" method="post" action="index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
&do=updateentryblog">
          		<table width="400" cellspacing="0" cellpadding="0" class="adminlist">
	    			<tr>
	    				<th colspan="2">Edición de Versión Anterior</th>
	    			</tr>
	    			<tr>
					  <td class="headlines">Titulo</td>
					  <td><input name="titulo" type="text" id="titulo" size="30" maxlength="255" class="required" value="<?php echo $this->_tpl_vars['titulo']; ?>
"/></td>
					</tr>
					<tr>
					  <td class="headlines">Video (id youtube)</td>
					  <td><input name="url_video" type="text" id="url_video" size="30" maxlength="255" value="<?php echo $this->_tpl_vars['url_video']; ?>
"/></td>
					</tr>
					<tr>
				   <td class="headlines" colspan="4">Contenido</td>
				 </tr>
				 <tr>
				   <td colspan="2">
				     <textarea name="contenido" id="contenido" class="mceEditor" rows="20"><?php echo $this->_tpl_vars['contenido']; ?>
</textarea>
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
			     </tr>
	    		 <tr>
			            <td colspan="4">
			            <input type="hidden" name="id_eventos" id="id_eventos" value="<?php echo $this->_tpl_vars['id_eventos']; ?>
"></input>
			            <input type="hidden" name="eid" id="eid" value="<?php echo $this->_tpl_vars['id_eventos']; ?>
"></input>
			            <input type="hidden" name="eb" id="eb" value="<?php echo $this->_tpl_vars['id']; ?>
"></input>
			            <input type="hidden" name="do_edit" id="do_edit" value="do"></input>
			            <input type="submit" name="Submit" value="Enviar" /> 
			            <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
&do=view&eid=<?php echo $this->_tpl_vars['id_eventos']; ?>
'">
			            </td>
	    			</tr>
	    		</table>
	    	</form>
	       </td>
	     </tr>
	  </table>
	</td>
    <td width="1%">&nbsp;</td>
    <td width="49%" valign="top">
	  	<table class="adminlist">
	    	<tr>
	    		<th colspan="2">Información adicional</th>
	    	</tr>
	    	<tr>
				<td class="headlines">Evento</td>
				<td><?php echo $this->_tpl_vars['evento']; ?>
</td>
			</tr>
			<tr>
				<td class="headlines">Fecha Creación</td>
				<td><?php echo $this->_tpl_vars['fecha_publicacion']; ?>
</td>
			</tr>
			<tr>
				<td class="headlines">Ultima actualización</td>
				<td><?php echo $this->_tpl_vars['fecha_edicion']; ?>
</td>
			</tr>
		</table>
    </td>
  </tr>
</table>
</div>
</div>