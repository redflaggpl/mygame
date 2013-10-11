<?php /* Smarty version 2.6.26, created on 2012-06-03 22:06:08
         compiled from reportes/reportesCurso.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'reportes/reportesCurso.tpl', 23, false),)), $this); ?>
<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <td class="curso">
		<h2><?php echo $this->_tpl_vars['curso']; ?>
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
          <th colspan="3">Detalle de Estudiantes</th>
        </tr>
        <tr>
        <th class="title">#</th>
	      <th class="title">Estudiante</th>
	      <th class="title">Max. Desafio Aprobado</th>
	    </tr>
        <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['estudiantes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	       onmouseout="rowOutEffect(this)" 
	       >
	      <td ><?php echo $this->_sections['row']['iteration']; ?>
</td>
	      <td><?php echo $this->_tpl_vars['estudiantes'][$this->_sections['row']['index']]['estudiante']; ?>
</td>
	      <td><?php echo $this->_tpl_vars['estudiantes'][$this->_sections['row']['index']]['desafio']; ?>
</td>
	    </tr>
	    <?php endfor; else: ?>
	    <tr>
	      <td colspan="7">No se han registrado instituciones</td>
	    </tr>
	    <?php endif; ?>
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