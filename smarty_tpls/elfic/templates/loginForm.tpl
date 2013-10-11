{assign var="title" value=""}
{include file="html_login_top.tpl"}
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

{include file="footer.tpl"}
{include file="html_bottom.tpl"}

