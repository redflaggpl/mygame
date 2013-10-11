<?php /* Smarty version 2.6.26, created on 2012-07-03 10:50:04
         compiled from password/changeForm.tpl */ ?>
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
<h2>Actualice su contrase&ntilde;a</h2>
<p>Digite su nueva contrase&ntilde;a.</p>
<form id="form2" name="form2" method="post" action="index.php?action=actualiza">
Contrase&ntilde;a: <input name="password" type="password" id="password" />
Confirmar contrase&ntilde;a: <input name="confirma" type="password" id="confirma" />
<input name="ueml" type="hidden" id="ueml" value="<?php echo $this->_tpl_vars['email']; ?>
" />
<input name="token" type="hidden" id="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
<input name="front" type="hidden" id="front" value="<?php echo $this->_tpl_vars['front']; ?>
" />
<input type="submit" name="Submit" value="Enviar" />
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