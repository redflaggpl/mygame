<?php

/**
 * @Package: MyGame
 * @subpackage Reportes
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.ins.net.co
 * @Date: mayo 22, 2012
 * @source : Reportes.php
 * @Version: 1.0
 */

class Reportes extends Utils {
	
	
	function resumen()
	{
		$tpl = new Elfic_Smarty();
		
		$tpl->display('reportes'.DS.'reportesResumen.tpl');
	}
	
	
	/**
	 * Exporta consulta a excel y genera descarga
	 * @param $export_file
	 */
	 function createExcel($filename, $arrydata)
	 {
		$excelfile = "xlsfile://tmp/".$filename;  
		$fp = fopen($excelfile, "wb");  
		if (!is_resource($fp)) {  
			die("Error al crear $excelfile");  
		}  
		fwrite($fp, serialize($arrydata));  
		fclose($fp);
		Elfic::cosRedirect('export.php?filename='. $filename);
	 }
}