<?php /* Smarty version 2.6.26, created on 2011-01-06 09:29:58
         compiled from mediaView.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<link href="css/basicstyles.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
  <link rel="stylesheet" href="css/template.css" type="text/css" />
  <link rel="stylesheet" href="css/tabpane.css" type="text/css" />
  <link rel="stylesheet" href="css/general.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/tiny_mce/tiny_mce_popup.js"></script>
<script type="text/javascript" src="js/tiny_mce/plugins/jfilebrowser/js/dialog.js"></script>
<?php echo '
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
    	$("#adminForm").validate({ 
			rules: {
				urlfoto: { /*id del campo que se aplica la regla*/
				accept: "jpg|png|gif" /*extensiones aceptadas*/
				}
			}
		});
	});

	</script>
'; ?>

</head>
<body>
<div id="media_upload">
	<form name="adminForm" id="adminForm" method="post" enctype="multipart/form-data" action="filebrowser.php?action=upload">
		<table width="100%">
			<tr>
				<td>
					Archivo: <input type="file" size="20" maxlength="120" name="imagen" id="imagen" value="" class="required accept" />
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<input name="cargar" type="submit" id="cargar" value="Subir" >
				</td>
			</tr>
		</table>
	</form>
</div>
<div id="media_box">
<?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['media']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
	<div id='image_box' onclick="jFileBrowserDialog.insert('<?php echo $this->_tpl_vars['path_img']; ?>
<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
', 
			'1', '<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
');return false;">
	<img src='<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['path']; ?>
/<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
' 
		width="80" height="60"	name="<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
" 
		onClick="cambiar('<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
')">
	<div id='img_name'><?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
</div>
		<a href="filebrowser.php?action=drop&img=<?php echo $this->_tpl_vars['media'][$this->_sections['row']['index']]['imagen']; ?>
" 
		><img src="images/remove.png"/></a>					</div>
<?php endfor; else: ?>
	No hay imágenes
<?php endif; ?>
</div>
</body>