<?php /* Smarty version 2.6.26, created on 2012-06-28 11:52:00
         compiled from top_menu.tpl */ ?>
<table width="100%" class="menubar" cellpadding="0" cellspacing="0">
<tr>
  <td class="menubg" style="padding-left:5px">
    <div id="myMenuID"></div>
    <SCRIPT LANGUAGE="JavaScript"><!--
      var myMenu =
      [
        [null, 'Home', 'index2.php', null, 'Panel de Control'],  // a menu item
        <?php if ($this->_tpl_vars['instituciones'] == 1): ?>
        [null, 'Instituciones', 'index2.php?com=instituciones', null, null,   // a folder item
         ],
        <?php endif; ?>
        <?php if ($this->_tpl_vars['cursos'] == 1): ?>
        [null, 'Cursos', 'index2.php?com=cursos', null, null,   // a folder item
         ],
         <?php endif; ?>
        <?php if ($this->_tpl_vars['docentes'] == 1): ?>
        [null, 'Docentes', 'index2.php?com=usuarios&do=docentes', null, null,   // a folder item
         ],
        <?php endif; ?>
        <?php if ($this->_tpl_vars['estudiantes'] == 1): ?>
        [null, 'Estudiantes', 'index2.php?com=usuarios&do=estudiantes', null, null,   // a folder item
         ],
        <?php endif; ?>
        <?php if ($this->_tpl_vars['usuarios'] == 1): ?>
        [null, 'Usuarios', 'index2.php?com=usuarios', null, null,   // a folder item
         ],
        <?php endif; ?>
      ];
      cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
    --></SCRIPT>
  </td>
  <td class="menubg" align="right" style="padding-right:5px">
    <strong><a href="index.php?action=logout">Finalizar</a> &nbsp; <?php echo $this->_tpl_vars['login']; ?>
</strong>
  </td>
</tr>
</table>