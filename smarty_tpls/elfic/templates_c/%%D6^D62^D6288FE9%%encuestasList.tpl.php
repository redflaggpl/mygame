<?php /* Smarty version 2.6.26, created on 2011-10-18 09:34:17
         compiled from encuestas/encuestasList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'encuestas/encuestasList.tpl', 79, false),)), $this); ?>
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
	<script type="text/javascript">

		function estado(){ 
		    if (document.forms["adminForm1"].chk.checked) 
		     seleccionar_todo();
		    else 
		     deseleccionar_todo();
		} 
	   
        function seleccionar_todo()
		{//Funcion que permite seleccionar todos los checkbox
	
		form = document.forms["adminForm1"]
		for (i=0;i<form.elements.length;i++)
		    {
		    if(form.elements[i].type == "checkbox")form.elements[i].checked=1;
		    }
		} 
	
		function deseleccionar_todo()
		{//Funcion que permite deseleccionar todos los checkbox
	
		form = document.forms["adminForm1"]
		for (i=0;i<form.elements.length;i++)
		    {
		    if(form.elements[i].type == "checkbox")form.elements[i].checked=0;
		    }
		}
	</script>
    
'; ?>

<form id="adminForm1" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>
?com=encuestas" method="post" name="adminForm1">
<div align="center" class="centermain">
  <div class="main">
    <table class="adminheading">
    <tr>
      <th class="questsnew">
        Encuestas 
      </th>
      <th width="350">
          <table width="300" >
      	    <tr>
      	        <td>
      	            <input name="do" type="hidden" id="do" value="delmul"/>
      	            <input name="delmul" type="submit" id="delmul" value="Borrar"/>
      	        </td>
      	    </tr>
    	</table>
    </th>
    </tr>
    </table>
    <table class="adminlist">
    <tr>
      <th class="title">#</th>
       <th class="title">ID</th>
      <th class="title">
          <input type="checkbox" name="chk" onClick="estado()">
          </th>
      <th class="title">Titulo</th>
      <th class="title">Observaciones</th>
      <th class="title">Fecha de Creación</th>
      <th class="title">Acciones</th>
    </tr>
   <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['lista']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <td><?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['id']; ?>
</td>
      <td><input type="checkbox" name="cb[<?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['id']; ?>
]" id="cb[<?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['id']; ?>
]"></td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=encuestas&do=new&eid=<?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['titulo']; ?>
</td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=encuestas&do=new&eid=<?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['observaciones']; ?>
</td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=encuestas&do=new&eid=<?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['id']; ?>
'"><?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['fecha']; ?>
</td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)">
          <a href="index2.php?com=encuestas&do=new&eid=<?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['id']; ?>
">Responder</a> - 
          <a href="index2.php?com=encuestas&do=resultados&eid=<?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['id']; ?>
">Resultados</a> - 
          <a href="index2.php?com=encuestas&do=edit&eid=<?php echo $this->_tpl_vars['lista'][$this->_sections['row']['index']]['id']; ?>
">Editar</a>
          <!-- <a href="">Borrar</a>-->
      </td>
    </tr>
    <?php endfor; else: ?>
    <tr>
      <td colspan="8">No hay encuestas disponibles</td>
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
<div id="break">
</div>
</form>
