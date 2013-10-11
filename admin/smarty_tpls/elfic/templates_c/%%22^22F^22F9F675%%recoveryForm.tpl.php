<?php /* Smarty version 2.6.26, created on 2012-07-03 10:24:00
         compiled from password/recoveryForm.tpl */ ?>
<?php $this->assign('title', ""); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "html_login_top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="ctr" align="center">
<?php if ($this->_tpl_vars['msg']): ?>
<div class="message">
  <?php echo $this->_tpl_vars['msg']; ?>

</div>
<?php endif; ?>
<h2>Recordar contrase&ntilde;a (Paso 1)</h2>
En tres sencillos pasos puede asignar una nueva contrase&ntilde;a a su cuenta.<br><br>
<p>1- Por favor ingrese el correo electr&oacute;nico asociado a su cuenta. 
Le enviaremos un mensaje con un enlace para que cambie de manera segura su clave.</p>
<p>2- Haga click en el, o corte y pegue en el navegador.</p>
<p>3- Ingrese su nueva contrase&ntilde;a.</p>
<p>Ingrese su email y haga click en Enviar para completar el paso 1</p>
<br><form id="form1" name="form1" method="post" action="index.php?action=cambiar">
Email: <input name="ueml" type="text" id="ueml" /> 
<input type="submit" name="Submit" value="Enviar" />
<input type="hidden" name="front" value="<?php echo $this->_tpl_vars['front']; ?>
" />
</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "html_bottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>