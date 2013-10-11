<?php /* Smarty version 2.6.26, created on 2011-01-06 09:35:02
         compiled from unidadesturList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'unidadesturList.tpl', 46, false),)), $this); ?>
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
      <th class="orderslist">
        Unidades Turísticas: 
      </th>
      <th width="350">
      	<table>
      	<form id="adminForm" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>
?com=<?php echo $this->_tpl_vars['comp']; ?>
&do=search" method="post" name="adminForm">
    		<tr>
    			<td><input name="search" type = "text" id="search" value="" ></td>
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
      <!-- <th class="title">Id</th> -->
      <th class="title">Nombre</th>
      <th class="title">Categoría</th>
      <th class="title">Municipio</th>
      <th class="title">Usuario</th>
    </tr>
   <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['ut']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=unidadestur&do=view&utid=<?php echo $this->_tpl_vars['ut'][$this->_sections['row']['index']]['utid']; ?>
'">
      <td><?php echo $this->_sections['row']['iteration']; ?>
</td>
     <!--<td><?php echo $this->_tpl_vars['m'][$this->_sections['row']['index']]['id']; ?>
</td> -->
      <td><?php echo $this->_tpl_vars['ut'][$this->_sections['row']['index']]['nombre']; ?>
</td>
      <td><?php echo $this->_tpl_vars['ut'][$this->_sections['row']['index']]['categoria']; ?>
</td>
      <td><?php echo $this->_tpl_vars['ut'][$this->_sections['row']['index']]['municipio']; ?>
</td>
      <td><?php echo $this->_tpl_vars['ut'][$this->_sections['row']['index']]['propietario']; ?>
</td>
    </tr>
    <?php endfor; else: ?>
    <tr>
      <td colspan="8">No se han registrado Unidades Turísticas</td>
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
</div>
<div id="break"></div>
</div>
