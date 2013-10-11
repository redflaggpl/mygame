<?php /* Smarty version 2.6.26, created on 2012-06-28 10:51:20
         compiled from usuarios/adminInstitucionesList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'usuarios/adminInstitucionesList.tpl', 32, false),array('function', 'cycle', 'usuarios/adminInstitucionesList.tpl', 52, false),)), $this); ?>
<br />
<?php if ($this->_tpl_vars['msg'] != ''): ?>
<div class="message">
  <?php echo $this->_tpl_vars['msg']; ?>

</div>
<?php endif; ?>
<?php echo '
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
      <th class="usersnew">
        Administradores de Institución: 
      </th>
      <th width="350">
      	<table>
      	<form id="adminForm" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>
?com=usuarios&do=admin_institucion" method="post" name="adminForm">
    		<tr>
    			<td><input name="search" type = "text" id="search" value=""></td>
    		 	<?php if ($this->_tpl_vars['tipo'] == 'Usuarios'): ?>
    		 	<td>
    		 	<select name="perfil" id="perfil">
    		 	<option value="">Seleccione</option>
    				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['perfil']), $this);?>

    		 	</select>
    		 	</td>
    		 	<?php endif; ?>
    		 	<td><input name="do_search" type="submit" id="do_search" value="Buscar"/></td>
    		 </tr>
    	</form>
    	</table>
    </th>
    </tr>
    </table>
    <table class="adminlist">
    <tr>
      <th class="title">#</th>
      <th class="title">Id</th>
      <th class="title">Nombre</th>
      <th class="title">Institucion</th>
      <th class="title">Acciones</th>
    </tr>
   <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['u']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
" onmouseover="rowOverEffect(this)" 
       onmouseout="rowOutEffect(this)" >
      <td onclick="document.location.href='?com=usuarios&do=view_admininstitucion&uid=<?php echo $this->_tpl_vars['u'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_sections['row']['iteration']; ?>
</td>
      <td onclick="document.location.href='?com=usuarios&do=view_aadmininstitucion&uid=<?php echo $this->_tpl_vars['u'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['u'][$this->_sections['row']['index']]['id']; ?>
</td>
      <td onclick="document.location.href='?com=usuarios&do=view_admininstitucion&uid=<?php echo $this->_tpl_vars['u'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['u'][$this->_sections['row']['index']]['usuario']; ?>
</td>
      <td onclick="document.location.href='?com=usuarios&do=view_admininstitucion&uid=<?php echo $this->_tpl_vars['u'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['u'][$this->_sections['row']['index']]['institucion']; ?>
</td>
      <td><a href="index2.php?com=usuarios&do=view_admininstitucion&uid=<?php echo $this->_tpl_vars['u'][$this->_sections['row']['index']]['id']; ?>
">Editar</a> | 
          <a href="index2.php?com=usuarios&do=borrar&uid=<?php echo $this->_tpl_vars['u'][$this->_sections['row']['index']]['id']; ?>
&tipo=admin_institucion" 
             onclick='return confirmar("¿Confirma que desea borrar este usuario?");'>Borrar</a></td>
    </tr>
    <?php endfor; else: ?>
    <tr>
      <td colspan="8">No se han registrado Administradores de Institución</td>
    </tr>
    <?php endif; ?>
    </table>
   
    <table class="adminlist">
		<tr>
			<th align="center" colspan="2"><?php echo $this->_tpl_vars['anchors']; ?>
</th>
		</tr>
		<tr>
			<th align="center" colspan="2"><?php echo $this->_tpl_vars['total']; ?>
</th>
		</tr>
	</table>
  </div>
<div id="break"></div>
</div>
