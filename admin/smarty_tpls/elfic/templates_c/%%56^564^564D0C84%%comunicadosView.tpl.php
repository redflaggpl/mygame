<?php /* Smarty version 2.6.26, created on 2011-05-09 16:56:04
         compiled from comunicados/comunicadosView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_checkboxes', 'comunicados/comunicadosView.tpl', 44, false),array('function', 'cycle', 'comunicados/comunicadosView.tpl', 84, false),)), $this); ?>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/popup.js" type="text/javascript"></script>  	
'; ?>

<div align="center" class="centermain"> 
	<div class="main">
	<div id="msg"></div>
<table class="adminheading">
    <tr>
      <th class="comlist">
		Comunicados
      </th>
      <th width="350">
      	<table width="300" >
      	    <tr>
      	        <td><a href="index2.php?com=comunicados">&raquo; Recibidos</a></td>
      	        <td><a href="index2.php?com=comunicados&do=enviados">&raquo; Enviados</a></td>
      	        <td><a href="index2.php?com=comunicados&do=borrados">&raquo; Borrados</a></td>
      	    </tr>
    	</table>
    </th>
   </tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
            <form name="adminForm" id="adminForm" method="post" action="index2.php?com=comunicados&do=new">
 			  <table width="100%" cellspacing="0" cellpadding="0">
			    <tr>
				  <th colspan="6">Mensaje</th>
				</tr>
				<tr>
				   <td class="headlines">Asunto</td>
				   <td><?php echo $this->_tpl_vars['asunto']; ?>
</td>
				   <td class="headlines"></td>
				   <td></td>
				</tr>
				<tr>
					<td class="headlines">Para</td>
					<td><!-- <?php echo smarty_function_html_checkboxes(array('name' => 'dests','options' => $this->_tpl_vars['destinatarios'],'separator' => '<br />'), $this);?>
 -->
					    <div id="button"><a href="#" class="actionnew">Ver Destinatarios</a></div>
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class="headlines">Adjuntos</td>
					<td>
					    <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['adjuntos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					      <!--  &raquo; <a href="<?php echo $this->_tpl_vars['adjuntos'][$this->_sections['row']['index']]['path']; ?>
<?php echo $this->_tpl_vars['adjuntos'][$this->_sections['row']['index']]['url']; ?>
"><?php echo $this->_tpl_vars['adjuntos'][$this->_sections['row']['index']]['url']; ?>
</a><br> -->
					       <!-- &raquo; <a href="#" onclick="downloadAdjunto(<?php echo $this->_tpl_vars['adjuntos'][$this->_sections['row']['index']]['id']; ?>
,<?php echo $this->_tpl_vars['consecu']; ?>
);"><?php echo $this->_tpl_vars['adjuntos'][$this->_sections['row']['index']]['url']; ?>
</a><br> -->
					       &raquo; <a href="consultas.ajax.php?act=download&id=<?php echo $this->_tpl_vars['adjuntos'][$this->_sections['row']['index']]['id']; ?>
&consecu=<?php echo $this->_tpl_vars['consecu']; ?>
"><?php echo $this->_tpl_vars['adjuntos'][$this->_sections['row']['index']]['url']; ?>
</a><br>
					    <?php endfor; endif; ?>
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
				  <td class="headlines" colspan="4">Mensaje</td>
				</tr>
				<tr>
				  <td colspan="4">
				    <?php echo $this->_tpl_vars['mensaje']; ?>

				  </td>
				</tr>
				
			   </table>
			   <!-- ajax popup form crear produccion -->
               <div id="popupContact">
	               <a href="#" id="popupContactClose">X</a>
	               <div id="formpopup">
	                   <table>
	                       <tr>
	                           <td class="headlines">Estudiantes</td><td class="headlines">Profesores</td>
	                       </tr>
	                       <tr>
	                           <td  valign="top">
	                           <table>
	                           <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['dest_est']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							        <td><?php echo $this->_sections['row']['iteration']; ?>
</td>
								    <td><input type="checkbox" id="cb<?php echo $this->_sections['row']['index']; ?>
" 
								                name="dest_est[<?php echo $this->_sections['row']['index']; ?>
]"
										        value="<?php echo $this->_tpl_vars['dest_est'][$this->_sections['row']['index']]['documto_id']; ?>
" /></td>
								    <td><?php echo $this->_tpl_vars['dest_est'][$this->_sections['row']['index']]['fullname']; ?>
</td>
								</tr>
							    <?php endfor; endif; ?>
							    </table>
							    </td>
							    <td valign="top">
							    	<table>
							    	<?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['dest_prof']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								        <td><?php echo $this->_sections['row']['iteration']; ?>
</td>
									    <td><input type="checkbox" id="cb2-<?php echo $this->_sections['row']['index']; ?>
" 
									                name="dest_prof[<?php echo $this->_sections['row']['index']; ?>
]"
											        value="<?php echo $this->_tpl_vars['dest_prof'][$this->_sections['row']['index']]['documto_id']; ?>
" /></td>
									    <td><?php echo $this->_tpl_vars['dest_prof'][$this->_sections['row']['index']]['fullname']; ?>
</td>
								    </tr>
							    <?php endfor; endif; ?>
							    </table>
							    </td>
						    </tr>
		               </table>
	               </div> 
               </div>
               <div id="backgroundPopup"></div>
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

		<!-- incia tab +info -->
	      <div class="tab-page" id="info-page">
	       <h2 class="tab">+ Info</h2>
	         <?php echo '
	           <script type="text/javascript">
	             tabPane1.addTabPage( document.getElementById( "info-page" ) );
	           </script>
	         '; ?>

	         <table width="90%" cellpadding="5" cellspacing="0" border="0">
	         	<tr>
				  <td class="headlines">Fecha Enviado</td>
				  <td><?php echo $this->_tpl_vars['fecha']; ?>
</td>
				  <td class="headlines">Fecha vencimiento</td>
				  <td><?php echo $this->_tpl_vars['fecvence']; ?>
</td>
				</tr>
				<tr>
				   <td class="headlines">Categoría</td>
				   <td><?php echo $this->_tpl_vars['categoriamensaje']; ?>
</td>
				   <td class="headlines">Tipo</td>
				   <td><?php echo $this->_tpl_vars['tipomensaje']; ?>
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