<?php /* Smarty version 2.6.26, created on 2012-10-30 15:10:49
         compiled from reportes/reportesResumen.tpl */ ?>
<div align="center" class="centermain"> 
	<div class="main">
<table class="adminheading">
<table cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td width="50%" valign="top">
      <table width="100%" class="adminform">
        <tr>
          <th>Reportes</th>
        </tr>
        <tr>
          <td>&raquo <a href="index2.php?com=reportes&do=listar_estudiantes">Reporte por Estudiante</a></td>
        </tr>
        <tr>
          <td>&raquo <a href="index2.php?com=reportes&do=listar_cursos">Reporte por Curso</a></td>
        </tr>
      </table>
	  </td>
      <td width="1%">&nbsp;</td>
      	<td width="49%" valign="top">
		<!--  open tabs -->
		<div class="tab-page" id="pdetails-pane">
		  <?php echo '
		  <script type="text/javascript">
		    var tabPane1 = new WebFXTabPane( document.getElementById( "pdetails-pane" ), 1 );
		  </script>
		  '; ?>

		  	<!-- tab info -->
		  	<div class="tab-page" id="resumen-page">
		    	<h2 class="tab">Resumen</h2>
			    <?php echo '
			    <script type="text/javascript">
			      tabPane1.addTabPage( document.getElementById( "resumen-page" ) );
			    </script>
			    '; ?>

			   
			 </div>
			 <!-- end tab info -->
		 </div>
		 <!-- cierre tabs-->
		</td>
	</tr>
</table>
</div>
</div><br></br>
   