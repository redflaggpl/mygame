<?php /* Smarty version 2.6.26, created on 2011-01-13 10:26:59
         compiled from unidadturisticaNew.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'unidadturisticaNew.tpl', 89, false),)), $this); ?>
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
    	$("#adminForm1").validate();
    	$("#adminForm2").validate();
		});
	</script>
	<script src="js/popup.js" type="text/javascript"></script>  	
'; ?>

<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <th class="newproc">
		Nueva Unidad Turística
      </th>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
            <form name="adminForm" id="adminForm" enctype="multipart/form-data" method="post" action="index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
&do=new">
 			  <table width="100%" cellspacing="0" cellpadding="0">
			    <tr>
				  <th colspan="6">Datos de básicos de la Unidad Turí­stica</th>
				</tr>
				<tr>
				  <td class="headlines">Nombre</td>
				   <td><input name="nombre" type="text" id="nombre" size="30" maxlength="255" class="required" value=""/></td>
				   <td class="headlines">Foto</td>
				   <td><input name="urlfoto" type="file" id="urlfoto" size="30" maxlength="120" class="required" value=""/></td>
				</tr>
				<tr>
				   <td class="headlines" colspan="4">Instalaciones</td>
				 </tr>
				 <tr>
				   <td colspan="4">
				     <textarea name="instalaciones" id="instalaciones" class="mceEditor"><?php echo $this->_tpl_vars['instalaciones']; ?>
</textarea>
				   </td>
				 </tr>
				<tr>
				   <td class="headlines" colspan="4">Precios</td>
				 </tr>
				 <tr>
				   <td colspan="4">
				     <textarea name="precios" id="precios" class="mceEditor"><?php echo $this->_tpl_vars['precios']; ?>
</textarea>
				   </td>
				 </tr>
				 <tr>
				    <td class="headlines" colspan="4">Horarios de Atención</td>
				 </tr>
				 <tr>
				   <td colspan="4">
				     <textarea name="horarios_atencion" id="horarios_atencion" class="mceEditor"></textarea>
				   </td>
				 </tr>
				 <tr>
				   <td class="headlines">Dirección</td>
				   <td><input name="direccion" type="text" id="direccion" size="30" maxlength="255" class="required" value="<?php echo $this->_tpl_vars['direccion']; ?>
"/></td>
				   <td class="headlines">Telefono 1</td>
				   <td><input name="telefono_1" type="text" id="telefono_1" size="30" maxlength="100" class="required" value="<?php echo $this->_tpl_vars['telefono_1']; ?>
"/></td>
				 </tr>
				 <tr>
				   <td class="headlines">Telefono 2</td>
				   <td><input name="telefono_2" type="text" id="telefono_2" size="30" maxlength="255" class="" value="<?php echo $this->_tpl_vars['telefono_2']; ?>
"/></td>
				   <td class="headlines">Telefono 3</td>
				   <td><input name="telefono_3" type="text" id="telefono_3" size="30" maxlength="100" class="" value="<?php echo $this->_tpl_vars['telefono_3']; ?>
"/></td>
				 </tr>
				 <tr>
				   <td class="headlines">Email</td>
				   <td><input name="email" type="text" id="email" size="30" maxlength="255" class="required email" value="<?php echo $this->_tpl_vars['email']; ?>
"/></td>
				   <td class="headlines">Categoría</td>
				   <td>
				   		<select name="id_categorias" id="id_categorias" class="required">
			            <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['categorias'],'selected' => $this->_tpl_vars['sel_cat']), $this);?>

			          </select>
				   </td>
				 </tr>
			     <tr>
			       <td class="headlines">Municipio</td>
			       <td>
			         <select name="id_municipios_cats" id="id_municipios_cats" class="required">
			            <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['municipios']), $this);?>

			          </select>
			       </td>
			       <td class="headlines">Publicado</td>
			       <td>
			          <select name="publicado" id="publicado" class="required">
			            <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['publicado'],'selected' => $this->_tpl_vars['sel_publicado']), $this);?>

			          </select>
			       </td>
			     </tr>
			     <tr>
			       <td>
			         <input type="hidden" id="do_save" name="do_save" value="do">
			       </td>
			       <td>
			           <input type="submit" name="Submit" value="Enviar" />
			           <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
'"></td>
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
	  
    </td>
  </tr>
</table>
</div>
</div>