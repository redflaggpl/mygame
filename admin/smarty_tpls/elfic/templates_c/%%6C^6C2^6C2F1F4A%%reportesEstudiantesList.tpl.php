<?php /* Smarty version 2.6.26, created on 2012-06-02 13:15:39
         compiled from reportes/reportesEstudiantesList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'reportes/reportesEstudiantesList.tpl', 16, false),array('function', 'cycle', 'reportes/reportesEstudiantesList.tpl', 34, false),)), $this); ?>
<div align="center" class="centermain">
  <div class="main">
    <table class="adminheading">
    <tr>
      <th>
        Estudiantes
      </th>
      <th width="350">
      	<table>
      	<form id="adminForm" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>
?com=reportes&do=listar_estudiantes" method="post" name="adminForm">
    		<tr>
    			<td><input name="search" type = "text" id="search" value=""></td>
    		 	<td>
    		 	<select name="cursos_id" id="cursos_id">
    		 	<option value="">Curso</option>
    				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['cursos'],'selected' => $this->_tpl_vars['cursos_id']), $this);?>

    		 	</select>
    		 	</td>
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
      <th class="title">Nombre</th>
      <th class="title">Curso</th>
      <th class="title">Reporte</th>
    </tr>
   <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)">
      <td><?php echo $this->_sections['row']['iteration']; ?>
</td>
      <td><?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['estudiante']; ?>
</td>
      <td><?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['curso']; ?>
</td>
      <td><a href="index2.php?com=reportes&do=estudiante&eid=<?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['id']; ?>
">Ver</a></td>
    </tr>
    <?php endfor; else: ?>
    <tr>
      <td colspan="8">No hay registros</td>
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
