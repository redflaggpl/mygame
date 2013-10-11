<table width="100%" class="menubar" cellpadding="0" cellspacing="0">
<tr>
  <td class="menubg" style="padding-left:5px">
    <div id="myMenuID"></div>
    <SCRIPT LANGUAGE="JavaScript"><!--
      var myMenu =
      [
        [null, 'Home', 'index2.php', null, 'Panel de Control'],  // a menu item
        {if $instituciones eq 1}
        [null, 'Instituciones', 'index2.php?com=instituciones', null, null,   // a folder item
         ],
        {/if}
        {if $cursos eq 1}
        [null, 'Cursos', 'index2.php?com=cursos', null, null,   // a folder item
         ],
         {/if}
        {if $docentes eq 1}
        [null, 'Docentes', 'index2.php?com=usuarios&do=docentes', null, null,   // a folder item
         ],
        {/if}
        {if $estudiantes eq 1}
        [null, 'Estudiantes', 'index2.php?com=usuarios&do=estudiantes', null, null,   // a folder item
         ],
        {/if}
        {if $usuarios eq 1}
        [null, 'Usuarios', 'index2.php?com=usuarios', null, null,   // a folder item
         ],
        {/if}
      ];
      cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
    --></SCRIPT>
  </td>
  <td class="menubg" align="right" style="padding-right:5px">
    <strong><a href="index.php?action=logout">Finalizar</a> &nbsp; {$login}</strong>
  </td>
</tr>
</table>