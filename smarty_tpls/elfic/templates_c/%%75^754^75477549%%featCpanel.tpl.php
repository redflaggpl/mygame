<?php /* Smarty version 2.6.26, created on 2011-09-14 12:06:53
         compiled from featCpanel.tpl */ ?>
<div align="center" class="centermain"> 
	<div class="main">
	<table class="adminheading">
    <tr>
      <th class="produccion">
        Panel de Control
      </th>

    </tr>
    </table>
   <table class="adminform">
    <tr>
      <td width="45%" valign="top"> 
    <div id="cpanel">
       <div style="float:left;">
            <div class="icon">
                <a href="index2.php?com=encuestas">
                    <img src="images/iconos/kchart_48.png"  alt="Encuestas" align="middle" border="0" />  
                    <span>Encuestas</span>
                </a>
            </div>
        </div>
        <div style="float:left;">
            <div class="icon">
                <a href="index2.php?com=usuarios">
                    <img src="images/iconos/user.png"  alt="Usuarios" align="middle" border="0" />  
                    <span>Usuarios</span>
                </a>
            </div>
        </div>
</div>
<td width="10%">&nbsp;</td>

      <td width="45%" valign="top">
	<div style="width: 100%;">
	  <form action="index2.php" method="post" name="adminForm">
	  <div class="tab-page" id="modules-cpanel">
	  
	  <script type="text/javascript">
	    var tabPane1 = new WebFXTabPane( document.getElementById( "modules-cpanel" ), 1 )
	  </script>
	  
	    <div class="tab-page" id="module1">
	      <h2 class="tab">Encuestas</h2>
	      <script type="text/javascript">
	        tabPane1.addTabPage( document.getElementById( "module1" ) );
	      </script>

	      <table class="adminlist">
	      <tr>
	        <th>Titulo</th><th>Cantidad</th>
	      </tr>
	      <?php echo $this->_tpl_vars['countorders']; ?>

	      </table>
	    </div>
	  </div>
	  </form>

	</div>
      </td>
    </tr>
    </table>
    </div>
    </div>