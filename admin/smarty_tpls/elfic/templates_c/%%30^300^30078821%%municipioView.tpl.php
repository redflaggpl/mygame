<?php /* Smarty version 2.6.26, created on 2011-01-06 09:50:47
         compiled from municipioView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'municipioView.tpl', 102, false),array('function', 'cycle', 'municipioView.tpl', 152, false),)), $this); ?>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
    	$("#adminForm").validate();
    	$("#adminForm1").validate();
    	$("#adminForm2").validate({ 
			rules: {
				urlfoto: { /*id del campo que se aplica la regla*/
				accept: "jpg|png" /*extensiones aceptadas*/
				}
			}
		});
	});

	</script>
	<script src="js/popup.js" type="text/javascript"></script>  	
'; ?>

<?php echo '
  <link rel="stylesheet" href="js/jquery.superbox.css" type="text/css" media="all" />
  <!--  <script type="text/javascript" src="js/jquery.superbox-min.js"></script> -->
  <script type="text/javascript" src="js/jquery.superbox.js"></script>
  <script type="text/javascript"> 
		$(function(){
			$.superbox.settings = {
				closeTxt: "X",
				loadTxt: "Cargando...",
				nextTxt: "Next",
				prevTxt: "Previous",
				boxWidth: "350", // Default width of the box
				boxHeight: "280", // Default height of the box
			};
			$.superbox();
		});
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
            <form name="adminForm" id="adminForm" method="post" action="index2.php?com=municipios&do=view&mid=<?php echo $this->_tpl_vars['mid']; ?>
">
 			  <table width="100%" cellspacing="0" cellpadding="0">
			    <tr>
				  <th colspan="6">Datos de básicos del municipio</th>
				</tr>
				<tr>
				  <td class="headlines">Nombre</td>
				   <td><input name="nombre" type="text" id="nombre" size="30" maxlength="255" class="required" value="<?php echo $this->_tpl_vars['nombre']; ?>
"/></td>
				   <td class="headlines">Foto</td>
				   <td><input name="urlfoto" type="text" id="urlfoto" size="30" maxlength="30" class="" value="<?php echo $this->_tpl_vars['urlfoto']; ?>
" readonly="true"></td>
				</tr>
				<tr>
				   <td class="headlines" colspan="4">Descripción</td>
				 </tr>
				 <tr>
				   <td colspan="4">
				     <textarea  name="desc" id="desc" class="mceNoEditor"><?php echo $this->_tpl_vars['descripcion']; ?>
</textarea>
				   </td>
				 </tr>
				<tr>
				   <td class="headlines" colspan="4">Que hacer</td>
				 </tr>
				 <tr>
				   <td colspan="4">
				     <textarea name="que_hacer" id="que_hacer" style="width:100%" class="mceEditor"><?php echo $this->_tpl_vars['que_hacer']; ?>
</textarea>
				   </td>
				 </tr>
				 <tr>
				   <td class="headlines" colspan="4">Como Llegar</td>
				 </tr>
				 <tr>
				   <td colspan="4">
				     <textarea name="como_llegar" id="como_llegar" style="width:100%" class="mceNoEditor"><?php echo $this->_tpl_vars['como_llegar']; ?>
</textarea>
				   </td>
				 </tr>
				 <tr>
				   <td class="headlines" colspan="4">Recomendaciones</td>
				 </tr>
				 <tr>
				   <td colspan="4">
				     <textarea name="recomendaciones" id="recomendaciones" style="width:100%" class="mceEditor"><?php echo $this->_tpl_vars['recomendaciones']; ?>
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
			       <td class="headlines"></td>
			       <td></td>
			     </tr>
			     <tr>
			       <td>
			         <input type="hidden" id="do_edit" name="do_edit" value="do">
			         <input type="hidden" id="mid" name="mid" value="<?php echo $this->_tpl_vars['mid']; ?>
">
			         <input type="hidden" id="uid" name="uid" value="<?php echo $this->_tpl_vars['uid']; ?>
">
			       </td>
			       <td><input type="submit" name="Submit" value="Enviar" /> <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=municipios'"></td>
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

	  <!-- incia tab sitios -->
	  <div class="tab-page" id="sitios-page">
	    <h2 class="tab">Sitios</h2>
	    <?php echo '
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "sitios-page" ) );
	    </script>
	    '; ?>

	     <div class="actionsbar">
	    	<div id="button"><a href="#" class="actionnew">Nuevo sitio</a></div>
	   	</div> 
	    <div id="socialinf">
	    <table class="adminlist">
	    	<tr>
	    		<th>Nombre</th>
	    		<th>Descripción</th>
	    		<th>Como llegar</th>
	    		<th>Acciones</th>
	    	</tr>
		 <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['sitios']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		   <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#f4f4f4,#e8e8e8"), $this);?>
">
		   		<td><?php echo $this->_tpl_vars['sitios'][$this->_sections['row']['index']]['nombre']; ?>
 </td>
		      	<td><?php echo $this->_tpl_vars['sitios'][$this->_sections['row']['index']]['descripcion']; ?>
</td>
		      	<td><?php echo $this->_tpl_vars['sitios'][$this->_sections['row']['index']]['como_llegar']; ?>
</td>
		      	<td>
		      		<a href="components/municipios/municipios.ajax.php?act=viewvideo&sid=<?php echo $this->_tpl_vars['sitios'][$this->_sections['row']['index']]['sid']; ?>
" 
		      		rel="superbox[iframe]">
		      		<img src="images/iconos/film_go.png" border="0"></img>
		      		</a>
		      		<a href="index2.php?com=municipios&do=borrasitio&sid=<?php echo $this->_tpl_vars['sitios'][$this->_sections['row']['index']]['sid']; ?>
&mid=<?php echo $this->_tpl_vars['mid']; ?>
" 
		      		onclick="return confirm('¿Está seguro?');">
		      		<img src="images/iconos/delete.png" border="0"></img>
		      		</a>
		      	</td>
		     </tr>
		    <?php endfor; else: ?>
		    <tr>
		      <td colspan="4">No hay sitios turísticos registrados para este municipio</td>
		    </tr>
		   <?php endif; ?>
		   </table>
		   </div>
		 </div>
		<!-- fin tab sitios -->
		<!-- incia tab eventos -->
	  <div class="tab-page" id="eventos-page">
	    <h2 class="tab">Eventos</h2>
	    <?php echo '
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "eventos-page" ) );
	    </script>
	    '; ?>

	     <div id="socialinf">
		    <table class="adminlist">
		    	<tr>
		    		<th>Nombre</th>
		    		<th>Categoría</th>
		    	</tr>
			 <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['eventos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			   <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#f4f4f4,#e8e8e8"), $this);?>
">
			   		<td><?php echo $this->_tpl_vars['eventos'][$this->_sections['row']['index']]['nombre']; ?>
 </td>
			      	<td><?php echo $this->_tpl_vars['eventos'][$this->_sections['row']['index']]['descripcion']; ?>
</td>
			     </tr>
			    <?php endfor; else: ?>
			    <tr>
			      <td colspan="4">No hay eventos registrados para este municipio</td>
			    </tr>
			   <?php endif; ?>
			 </table>
		   </div>
		 </div>
		<!-- fin tab eventos -->
		 <!-- incia tab media -->
	      <div class="tab-page" id="media-page">
	       <h2 class="tab">Imágenes</h2>
	         <?php echo '
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "media-page" ) );
	           </script>
	         '; ?>

			 	<div id="media_upload">
					<form name="adminForm2" id="adminForm2" method="POST" enctype="multipart/form-data" action="index2.php?com=municipios&do=img_upload">
					<table width="100%">
					    <tr>
						  <td>
							Archivo: <input type="file" size="20" maxlength="120" name="urlfoto" id="urlfoto" value="" class="required accept" />
						  </td>
					    </tr>
					    <tr>
						 <td colspan="3">
						 <input name="mid" type="hidden" id="mid" value="<?php echo $this->_tpl_vars['mid']; ?>
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
					<a href="index2.php?com=municipios&do=img_del&mid=<?php echo $this->_tpl_vars['mid']; ?>
&img=<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
"><img src="images/remove.png"/></a>					</div>
					<?php endfor; else: ?>
							No hay imágenes cargadas para este municipio
					<?php endif; ?>
		   		</div>
		  </div>
		 <!-- fin tab media-->
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

		  </div>
		 <!-- fin tab +info -->
	  </div><!-- cierre tabs -->
    </td>
  </tr>
</table>
</div>
</div><br></br>
<!-- ajax popup form crear sitios -->
<div id="popupContact">
		<a href="#" id="popupContactClose">X</a>
		<div id="formpopup">
	    	<form name="adminForm4" id="adminForm4" method="post" action="index2.php?com=municipios&do=nuevositio&mid=<?php echo $this->_tpl_vars['mid']; ?>
">
          		<table width="400" cellspacing="0" cellpadding="0" class="adminlist">
	    			<tr>
	    				<th colspan="4">Sitio Turístico</th>
	    			</tr>
	    			<tr>
	    				<td>Nombre</td>
	    				<td>
	    					<input type="text" name="nombre" id="nombre" value="" class="required">
	    				</td>
	    				<td>ID Video</td>
	    				<td>
	    					<input type="text" name="url_video" id="url_video" value="" class="required">
	    				</td>
	    			</tr>
	    			<tr>
	    				<td valign="top">Descripción</td>
	    				<td colspan="3"><textarea name="descripcion" id="descripcion" cols="30" rows="3"></textarea></td>
	    			</tr>
	    			<tr>
	    				<td valign="top">Como llegar</td>
	    				<td colspan="3"><textarea name="como_llegar" id="como_llegar" cols="30" rows="3"></textarea></td>
	    			</tr>
	    			<tr>
			            <td colspan="4">
			            	<input type="hidden" name="finca_id" id="finca_id" value="<?php echo $this->_tpl_vars['fid']; ?>
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
   