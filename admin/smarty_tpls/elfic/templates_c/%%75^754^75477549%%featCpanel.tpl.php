<?php /* Smarty version 2.6.26, created on 2012-06-28 11:52:00
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
    <?php if ($this->_tpl_vars['superusuario'] == 1): ?>
       <div style="float:left;">
            <div class="icon">
                <a href="index2.php?com=usuarios">
                    <img src="images/iconos/user.png"  alt="Usuarios" align="middle" border="0" />  
                    <span>Usuarios</span>
                </a>
            </div>
        </div>
     
        <div style="float:left;">
            <div class="icon">
                <a href="index2.php?com=usuarios&do=admin_institucion">
                    <img src="images/iconos/admin_inst.png"  alt="Administradores de Institución" align="middle" border="0" />  
                    <span>Administradores</span>
                </a>
            </div>
        </div>
     <?php endif; ?>
      <?php if ($this->_tpl_vars['docentes'] == 1): ?>
        <div style="float:left;">
            <div class="icon">
                <a href="index2.php?com=usuarios&do=docentes">
                    <img src="images/iconos/profesores.png"  alt="Docentes" align="middle" border="0" />  
                    <span>Docentes</span>
                </a>
            </div>
        </div>
        <?php endif; ?>
         <?php if ($this->_tpl_vars['estudiantes'] == 1): ?>
        <div style="float:left;">
            <div class="icon">
                <a href="index2.php?com=usuarios&do=estudiantes">
                    <img src="images/iconos/estudiantes.png"  alt="Estudiantes" align="middle" border="0" />  
                    <span>Estudiantes</span>
                </a>
            </div>
        </div>
        <?php endif; ?>
         <?php if ($this->_tpl_vars['instituciones'] == 1): ?>
        <div style="float:left;">
            <div class="icon">
                <a href="index2.php?com=instituciones">
                    <img src="images/iconos/instituciones.png"  alt="Instituciones" align="middle" border="0" />  
                    <span>Instituciones</span>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['cursos'] == 1): ?>
        <div style="float:left;">
            <div class="icon">
                <a href="index2.php?com=cursos">
                    <img src="images/iconos/cursos.png"  alt="Cursos" align="middle" border="0" />  
                    <span>Cursos</span>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['reportes'] == 1): ?>
        <div style="float:left;">
            <div class="icon">
                <a href="index2.php?com=reportes">
                    <img src="images/iconos/reportes.png"  alt="Reportes" align="middle" border="0" />  
                    <span>Reportes</span>
                </a>
            </div>
        </div>
        <?php endif; ?>
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
	      <h2 class="tab">Inicio</h2>
	      <script type="text/javascript">
	        tabPane1.addTabPage( document.getElementById( "module1" ) );
	      </script>
		<table class="adminlist">
	      <tr>
	        <th>!Hola <?php echo $this->_tpl_vars['usuario']; ?>
!</th>
	      </tr>
	       <tr>
	       <td>
	           Bienvenido al administrador de <strong>MyGame!</strong>, 
	           el recurso multimedía que ayuda de manera divertida al aprendizaje y evaluación de 
	           conocimientos de inglés, conforme a los niveles A1 y A2 del marco europeo. 
	           Dependiendo de tu rol, aquí puedes realizar diferentes tareas:
	           <ul>
	            <li>Gestión de usuarios del sistema (Administrador General)</li>
	            <li>Gestión de Instituciones (Administrador General)</li>
	            <li>Gestión de Cursos, Estudiantes y Docentes (Administrador de Institución)</li>
	            <li>Resultados de desafios de estudiantes (Docente)</li>
	           </ul>
	       <td>
	       </tr>
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