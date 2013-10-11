<?php /* Smarty version 2.6.26, created on 2012-06-28 16:40:21
         compiled from loginForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'loginForm.tpl', 21, false),)), $this); ?>
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
<div class="login">
    <div class="login-form">
	<img src="images/login_text.png" alt="Login" />
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>
?action=submit" method="post">
	<?php if ($this->_tpl_vars['error'] != ""): ?>
            <?php if ($this->_tpl_vars['error'] == 'name_empty'): ?>You must supply a name.
            <?php elseif ($this->_tpl_vars['error'] == 'comment_empty'): ?> You must supply a comment.
            <?php endif; ?>
	<?php endif; ?>
	<div class="form-block">
	    <div class="inputlabel">Usuario:</div>
	    <div><input type="text" name="login" class="inputbox" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['post']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="40" /></div>
	    <div class="inputlabel">Password:</div>
	    <div><input type="password" name="passwd" class="inputbox" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['post']['passwd'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="40" /></div>
	    <div align="left"><input type="submit" class="button" value="Iniciar Sesi&oacute;n" /></div>
	</div>
        </form>
    </div>
    <div class="login-text">
	<div class="ctr"><img src="images/app_login.png" width="64" height="64" alt="security" /></div>
	<p>Hola!</p>
	<p>Por favor, ingrese con un <i>nombre de usuario</i> y <i>contrase&ntilde;a</i> v&aacute;lidos.</p>
    <p><a class="fancybox fancybox.iframe" href="index.php?action=recordar">Recordar Contrase&ntilde;a</a></p>
    </div>
    <div class="clr"></div>
</div>
</div>
<div id="break"></div>
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
