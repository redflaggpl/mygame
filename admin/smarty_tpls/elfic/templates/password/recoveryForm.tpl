{assign var="title" value=""}
{include file="html_login_top.tpl"}
{include file="header.tpl"}
<div id="ctr" align="center">
{if $msg}
<div class="message">
  {$msg}
</div>
{/if}
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
<input type="hidden" name="front" value="{$front}" />
</form>
</div>
{include file="footer.tpl"}
{include file="html_bottom.tpl"}