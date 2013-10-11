<?php /* Smarty version 2.6.26, created on 2012-07-03 10:20:26
         compiled from loginForm.tpl */ ?>
<?php $this->assign('title', ""); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "html_login_top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <div id="container-body">
  <div id="loginform">
  <fieldset id="signin_box">
    <form method="post" id="signin" action="index.php?action=submit">
      <p>
      <input id="login" name="login" value="" title="login" tabindex="4" type="text">
      </p>
      <p>
        <input id="passwd" name="passwd" value="" title="password" tabindex="5" type="password">
      </p>
      <p class="remember">
        <input id="signin_submit" value="Sign in" tabindex="6" type="submit">
      </p>
      <p> <a class="fancybox fancybox.iframe" href="admin/index.php?action=recordar&front=1">Forgot your password?</a></p>
    </form>
  </fieldset>
  </div>
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
