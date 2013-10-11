<?php /* Smarty version 2.6.26, created on 2011-01-13 16:32:26
         compiled from planesView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'planesView.tpl', 83, false),array('function', 'cycle', 'planesView.tpl', 186, false),)), $this); ?>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    	$("#adminForm").validate();
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
            <form name="adminForm" id="adminForm" method="post" action="index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
&do=view&pid=<?php echo $this->_tpl_vars['pid']; ?>
">
 			  <table width="100%" cellspacing="0" cellpadding="0">
			    <tr>
				  <th colspan="6">Datos básicos del Plan</th>
				</tr>
				<tr>
				  <td class="headlines">Nombre</td>
				   <td><input name="nombre" type="text" id="nombre" size="30" maxlength="255" class="required" value="<?php echo $this->_tpl_vars['nombre']; ?>
"/></td>
				   <td class="headlines">Foto</td>
				   <td><input name="urlfoto" type="text" id="urlfoto" size="30" maxlength="100" class="required" value="<?php echo $this->_tpl_vars['urlfoto']; ?>
" readonly="true"/></td>
				</tr>
				<tr>
				   <td class="headlines" colspan="4">Descripción</td>
				 </tr>
				 <tr>
				   <td colspan="4">
				     <textarea name="descripcion" id="descripcion" class="mceEditor"><?php echo $this->_tpl_vars['descripcion']; ?>
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
				   <td class="headlines" colspan="4">Horadios de Atención</td>
				 </tr>
				 <tr>
				   <td colspan="4">
				     <textarea name="horarios_atencion" id="horarios_atencion" class="mceEditor"><?php echo $this->_tpl_vars['horarios_atencion']; ?>
</textarea>
				   </td>
				 </tr>
				 <tr>
				  <td class="headlines">Telefono 1</td>
				   <td><input name="telefono_1" type="text" id="telefono_1" size="30" maxlength="100" class="required" value="<?php echo $this->_tpl_vars['telefono_1']; ?>
"/></td>
				   <td class="headlines">Telefono 2</td>
				   <td><input name="telefono_2" type="text" id="telefono_2" size="30" maxlength="255" class="" value="<?php echo $this->_tpl_vars['telefono_2']; ?>
"/></td>
				 </tr>
				 <tr>
				   <td class="headlines">Telefono 3</td>
				   <td><input name="telefono_3" type="text" id="telefono_3" size="30" maxlength="100" class="" value="<?php echo $this->_tpl_vars['telefono_3']; ?>
"/></td>
				   <td class="headlines">Email</td>
				   <td><input name="email" type="text" id="email" size="30" maxlength="255" class="required email" value="<?php echo $this->_tpl_vars['email']; ?>
"/></td>
				 </tr>
				 <tr>
				   <td class="headlines">Operador Turístico</td>
				   <td><input name="operador" type="text" id="operador" size="30" maxlength="255" class="required" value="<?php echo $this->_tpl_vars['operador']; ?>
"/></td>
				   <td class="headlines">Unidad Turística</td>
				   <td>
				   		<select name="id_unidad_turistica" id="id_unidad_turistica" class="">
			            <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['unidades'],'selected' => $this->_tpl_vars['unidad']), $this);?>

			          </select>
				   </td>
				 </tr>
				 <tr>
				   <td class="headlines">Muncipio</td>
				   <td>
				   		<select name="id_municipios_cats" id="id_municipios_cats" class="required">
			            <option value="">--</option>
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['municipios'],'selected' => $this->_tpl_vars['sel_mun']), $this);?>

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
			       <td class="headlines">Propietario / Operador</td>
			       <td>
			         <select name="id_usuarios" id="id_usuarios" class="required">
			            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['usuarios'],'selected' => $this->_tpl_vars['sel_usuario']), $this);?>

			          </select>
			       </td>
			       <td></td>
			       <td></td>
			     </tr>
			     <tr>
			       <td>
			         <input type="hidden" id="do_edit" name="do_edit" value="do">
			         <input type="hidden" id="pid" name="pid" value="<?php echo $this->_tpl_vars['pid']; ?>
">
			       </td>
			       <td><input type="submit" name="Submit" value="Enviar" /> <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
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
					<form name="adminForm2" id="adminForm2" method="POST" enctype="multipart/form-data" action="index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
&do=img_upload">
					<table width="100%">
					    <tr>
						  <td>
							Archivo: <input type="file" size="20" maxlength="120" name="urlfoto" id="urlfoto" value="" class="required accept" />
						  </td>
					    </tr>
					    <tr>
						 <td colspan="3">
						 <input name="pid" type="hidden" id="pid" value="<?php echo $this->_tpl_vars['pid']; ?>
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
					<a href="index2.php?com=planes&do=img_del&pid=<?php echo $this->_tpl_vars['pid']; ?>
&img=<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
"><img src="images/remove.png"/></a>					</div>
					<?php endfor; else: ?>
							No hay imágenes cargadas para este municipio
					<?php endif; ?>
		   		</div>
		  </div>
		 <!-- fin tab media-->
		 <!-- incia tab comentarios -->
	      <div class="tab-page" id="coms-page">
	       <h2 class="tab">Comentarios</h2>
	         <?php echo '
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "coms-page" ) );
	           </script>
	         '; ?>

	         <div id="tabcont">
	         <div id="com_main_box">
	         <table class="adminlist" bgcolor="<?php echo smarty_function_cycle(array('values' => "#f4f4f4,#e8e8e8"), $this);?>
">
	         
			    <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['com']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			    		<th width="150"><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['nombre']; ?>
 </th>
			    		<th>
			    		<a href="index2.php?com=<?php echo $this->_tpl_vars['comp']; ?>
&do=delcom&com_id=<?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['com_id']; ?>
&pid=<?php echo $this->_tpl_vars['pid']; ?>
">
			    			<img src="images/iconos/delete.png">
			    			</a>
			    		</th>
			    	</tr>
			    	<tr>
			    		<td>Email:</td><td ><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['email']; ?>
</td>
			    	</tr>
			    	<tr>
			    		<td>Celular</td><td><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['telefono']; ?>
</td>
			    	</tr>
			    	<tr>
			    		<td colspan="2">
			    		<strong>Comentario:</strong><br>
			    		<?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['comentario']; ?>

			    		</td>
			    	</tr>
			    	<tr>
			    		<td>Publicado</td><td><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['publicado']; ?>
</td>
			    		</tr><tr>
			    		<td>Fecha</td><td><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['fecha']; ?>
</td>
			    	</tr>
				    <?php endfor; else: ?>
				    <tr>
			    		<td colspan="4">No se han registrado comentarios</td>
			    	</tr>
				    <?php endif; ?>
				   </table>
				   </div>
		   </div>
		  </div>
		 <!-- fin tab comentarios -->
		 <!-- incia tab +info -->
	      <div class="tab-page" id="info-page">
	       <h2 class="tab">+ Info</h2>
	         <?php echo '
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "info-page" ) );
	           </script>
	         '; ?>

	         Creado por: <?php echo $this->_tpl_vars['creado_por']; ?>
<br>
	         Editado por: <?php echo $this->_tpl_vars['editado_por']; ?>
<br>
	         Creado en: <?php echo $this->_tpl_vars['fecha_creacion']; ?>
<br>
	         Última actualización: <?php echo $this->_tpl_vars['fecha_edicion']; ?>
<br></br>
	         Propietario: <a href="index2.php?com=usuarios&&do=view&uid=<?php echo $this->_tpl_vars['id_usuarios']; ?>
"><?php echo $this->_tpl_vars['propietario']; ?>
</a>
		  </div>
		 <!-- fin tab +info -->
	  </div><!-- cierre tabs -->
    </td>
  </tr>
</table>
</div>
</div>