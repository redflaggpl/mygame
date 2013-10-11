<?php /* Smarty version 2.6.26, created on 2011-05-26 12:07:58
         compiled from cursos/cursosEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'cursos/cursosEdit.tpl', 41, false),)), $this); ?>
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
	Nuevo curso
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
               action="index2.php?com=cursos&do=new">
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <th colspan="6">Detalles</th>
            </tr>
            <tr>
            <td class="headlines">Descripci�n</td>
             <td><input name="descrip" type="text" id="descri" size="30" 
                  maxlength="45" class="required" value="<?php echo $this->_tpl_vars['descrip']; ?>
"/></td>
              <td  class="headlines">Grado</td>
              <td>
                  <select name="grado" id="grado" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['grado'],'selected' => $this->_tpl_vars['grado_sel']), $this);?>

				  </select> 
              </td>
            <tr>
              <td class="headlines">Jornada</td>
              <td>
                  <select name="jornada" id="jornada" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['jornada'],'selected' => $this->_tpl_vars['jornada_sel']), $this);?>

				  </select> 
              </td>
              <td class="headlines">Docente</td>
              <td>
                  <select name="id_docente" id="id_docente" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['docente'],'selected' => $this->_tpl_vars['id_docente_sel']), $this);?>

				  </select> 
              </td>
            </tr>
            <tr>
              <td class="headlines">Sede</td>
              <td>
                  <select name="sede" id="sede" class="required">
					<option value="">--Seleccione--</option>
		  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['sede'],'selected' => $this->_tpl_vars['sede_sel']), $this);?>

				  </select> 
              </td>
              <td class="headlines"></td>
              <td></td>
            </tr>
            <tr>
              <td class="headlines">
                  <input type="hidden" name="do_save" value="do" />
              </td>
              <td><input type="submit" name="Submit" value="Enviar" /> <input type="button" name="Cancelar" value="Cancelar" onClick="location.href='index2.php?com=cursos'"></td>
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
	    <h2 class="tab">Información</h2>
	    <?php echo '
	    <script type="text/javascript">
	      tabPane1.addTabPage( document.getElementById( "info-page" ) );
	    </script>
	    '; ?>

	  </div>
	  <!-- fin tab info -->
		   </div><!-- cierre pestaÃ±as -->
		</td>
	</tr>
</table>
</div>
</div>