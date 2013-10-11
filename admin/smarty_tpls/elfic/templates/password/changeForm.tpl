{assign var="title" value=""}
{include file="html_login_top.tpl"}
{include file="header.tpl"}
<div id="ctr" align="center">
{if $msg}
<div class="message">
  {$msg}
</div>
{/if}
<h2>Actualice su contrase&ntilde;a</h2>
<p>Digite su nueva contrase&ntilde;a.</p>
<form id="form2" name="form2" method="post" action="index.php?action=actualiza">
Contrase&ntilde;a: <input name="password" type="password" id="password" />
Confirmar contrase&ntilde;a: <input name="confirma" type="password" id="confirma" />
<input name="ueml" type="hidden" id="ueml" value="{$email}" />
<input name="token" type="hidden" id="token" value="{$token}" />
<input name="front" type="hidden" id="front" value="{$front}" />
<input type="submit" name="Submit" value="Enviar" />
</form>
</div>
{include file="footer.tpl"}
{include file="html_bottom.tpl"}