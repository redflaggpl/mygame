<?php /* Smarty version 2.6.26, created on 2012-06-01 18:02:18
         compiled from instituciones/institucionesEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'instituciones/institucionesEdit.tpl', 41, false),)), $this); ?>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    	$("#adminForm").validate();
		});
	</script>
'; ?>


<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
    <tr>
      <th class="usersnew">
		Edición de Institución
      </th>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <td>
         <form name="adminForm" id="adminForm" method="post" 
               action="index2.php?com=instituciones&do=edit">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <th colspan="6">Detalles</th>
            </tr>
            <tr>
            <td class="headlines">Nombre</td>
             <td><input name="nombre" type="text" id="nombre" size="30" 
                  maxlength="100" class="required" value="<?php echo $this->_tpl_vars['nombre']; ?>
"/></td>
              <td  class="headlines"></td>
              <td>
                 <!-- <select name="rector_id" id="rector_id" class="required">
					<option value="">--Rector--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['usuarios'],'selected' => $this->_tpl_vars['rector_id']), $this);?>

				  </select> -->
              </td>
           </tr>
            <tr>
            <td class="headlines">Municipio</td>
             <td>
             	<select name="municipios_id" id="municipios_id" class="required">
					<option value="">--Municipio--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['municipios'],'selected' => $this->_tpl_vars['municipios_id']), $this);?>

				  </select> 
             </td>
              <td  class="headlines">Estado</td>
              <td>
                  <select name="estado" id="estado" class="required">
					<option value="">--Estado--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['estados'],'selected' => $this->_tpl_vars['estado']), $this);?>

				  </select> 
              </td>
           </tr>
            <tr>
              <td class="headlines">
                  <input type="hidden" name="do_edit" value="do" />
                  <input type="hidden" name="departamentos_id" value="50" />
                  <input type="hidden" name="iid" value="<?php echo $this->_tpl_vars['iid']; ?>
" />
              </td>
              <td>
                  <input type="submit" name="Submit" value="Enviar" /> 
                  <input type="button" name="Cancelar" value="Cancelar" 
                         onClick="location.href='index2.php?com=instituciones'">
              </td>
              <td></td>
              <td>&nbsp;</td>
            </tr>
          </table>
           </form>
          </td>
        </tr>
      </table>
    
	  </td>
      <td width="1%">&nbsp;</td>
      	<td width="49%" valign="top">
	<div class="tab-page" id="pdetails-pane">
	  <?php echo '
	  <script type="text/javascript">
	    var tabPane1 = new WebFXTabPane( document.getElementById( "pdetails-pane" ), 1 );
	  </script>
	  '; ?>

	  <!--  inicio tab info -->
	  <div class="tab-page" id="info-page">
	    <h2 class="tab">Cursos</h2>
	    <?php echo '
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "info-page" ) );
	    </script>
	    '; ?>

	  </div>
	  <!-- fin tab info -->
		   </div><!-- cierre pestañas -->
		</td>
	</tr>
</table>
</div>
</div>