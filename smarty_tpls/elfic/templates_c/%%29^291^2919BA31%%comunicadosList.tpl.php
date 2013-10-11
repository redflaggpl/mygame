<?php /* Smarty version 2.6.26, created on 2011-05-06 17:09:47
         compiled from comunicados/comunicadosList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'comunicados/comunicadosList.tpl', 71, false),array('function', 'cycle', 'comunicados/comunicadosList.tpl', 102, false),)), $this); ?>
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
?com=comunicados" method="post" name="adminForm1">
<div align="center" class="centermain">
  <div class="main">
    <table class="adminheading">
    <tr>
      <th class="comlist">
        Comunicados <?php echo $this->_tpl_vars['tipo']; ?>

      </th>
      <th width="350">
          <table width="300" >
      	    <tr>
      	        <td>
      	            <input name="do" type="hidden" id="do" value="delmul"/>
      	            <input name="delmul" type="submit" id="delmul" value="Borrar"/>
      	        </td>
      	        <td><a href="index2.php?com=comunicados">&raquo; Recibidos</a></td>
      	        <td><a href="index2.php?com=comunicados&do=enviados">&raquo; Enviados</a></td>
      	        <!-- <td><a href="index2.php?com=comunicados&do=borrados">&raquo; Borrados</a></td> -->
      	    </tr>
      	<!-- <form id="adminForm" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>
?com=comunicados" method="post" name="adminForm">
    		<tr>
    			<td><input name="search" type = "text" id="search" value=""></td>
    		 	<td>
    		 	<select name="tipmens" id="tipmens">
    		 	<option value="">Seleccione</option>
    				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tipmens'],'selected' => $this->_tpl_vars['sel_tipmens']), $this);?>

    		 	</select>
    		 	</td>
    		 	<td>
    		 	<select name="categoria" id="categoria">
    		 	<option value="">Seleccione</option>
    				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['categoria'],'selected' => $this->_tpl_vars['sel_categoria']), $this);?>

    		 	</select>
    		 	</td>
    		 	<td><input name="do_search" type="submit" id="do_search" value="Buscar"/></td>
    		 </tr>
    	</form>  -->
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
      <th class="title">Remitente</th>
      <th class="title">Asunto</th>
      <th class="title"></th>
      <th class="title">Fecha de Envío</th>
      <th class="title">Vencimiento</th>
    </tr>
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
   <?php if ($this->_tpl_vars['com'][$this->_sections['row']['index']]['leido'] == '1'): ?>
   <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#f4f4f4,#e8e8e8"), $this);?>
" class="leido">
   <?php endif; ?>
   <?php if ($this->_tpl_vars['com'][$this->_sections['row']['index']]['leido'] == '0'): ?>
   <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#f4f4f4,#e8e8e8"), $this);?>
" class="noleido">
   <?php endif; ?>
      <td><?php echo $this->_sections['row']['iteration']; ?>
</td>
      <td><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['consecu']; ?>
</td>
      <td><input type="checkbox" name="cb[<?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['consecu']; ?>
]" id="cb[<?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['consecu']; ?>
]"></td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=comunicados&do=view&consecu=<?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['consecu']; ?>
'"><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['documto_id']; ?>
</td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=comunicados&do=view&consecu=<?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['consecu']; ?>
'"><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['asunto']; ?>
</td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=comunicados&do=view&consecu=<?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['consecu']; ?>
'"><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['adjuntos']; ?>
</td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=comunicados&do=view&consecu=<?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['consecu']; ?>
'"><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['fecha']; ?>
</td>
      <td onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='?com=comunicados&do=view&consecu=<?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['consecu']; ?>
'"><?php echo $this->_tpl_vars['com'][$this->_sections['row']['index']]['fecvence']; ?>
</td>
    </tr>
    <?php endfor; else: ?>
    <tr>
      <td colspan="8">No hay comunicados en bandeja de entrada</td>
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
</form>
