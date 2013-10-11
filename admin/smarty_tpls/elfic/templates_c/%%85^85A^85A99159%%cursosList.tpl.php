<?php /* Smarty version 2.6.26, created on 2012-06-01 15:12:30
         compiled from cursos/cursosList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'cursos/cursosList.tpl', 29, false),)), $this); ?>
<br />
<?php if ($this->_tpl_vars['msg'] != ''): ?>
<div class="message">
  <?php echo $this->_tpl_vars['msg']; ?>

</div>
<?php endif; ?>

<div align="center" class="centermain">
  <div class="main">
    <table class="adminheading">
    <tr>
      <th class="usersnew">
        Cursos: 
      </th>
      <th width="350"></th>
    </tr>
    </table>
    <table class="adminlist">
    <tr>
      <th class="title">#</th>
      <th class="title">Curso</th>
      <th class="title">Grado</th>
      <th class="title">Institución</th>
      <th class="title">Docente</th>
      <th class="title">Estado</th>
      <th class="title">Acciones</th>
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
" onmouseover="rowOverEffect(this)" 
       onmouseout="rowOutEffect(this)" >
      <td><?php echo $this->_sections['row']['iteration']; ?>
</td>
      <td onclick="document.location.href='?com=cursos&do=edit&cid=<?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['curso']; ?>
</td>
      <td onclick="document.location.href='?com=cursos&do=edit&cid=<?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['grados_id']; ?>
</td>
      <td onclick="document.location.href='?com=cursos&do=edit&cid=<?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['institucion']; ?>
</td>
      <td onclick="document.location.href='?com=cursos&do=edit&cid=<?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['docente']; ?>
</td>
      <td onclick="document.location.href='?com=cursos&do=edit&cid=<?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['estado']; ?>
</td>
      <td>
      	<a href="index2.php?com=cursos&do=edit&cid=<?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['id']; ?>
">Editar</a> |
      	<a href="index2.php?com=cursos&do=borrar&cid=<?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']]['id']; ?>
" 
      	onclick="return confirmar('¿Confirma que desea borrar el registro?');">Borrar</a>
      </td>
      
    </tr>
    <?php endfor; else: ?>
    <tr>
      <td colspan="7">No se han registrado cursos</td>
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
