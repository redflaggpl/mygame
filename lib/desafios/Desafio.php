<?php

class Desafio extends Elfic {
	
    private $_id = "";
    
    private $_escenario_id;
    
    private $_respuesta_id;
    
    private $_tipo_id;
	
    public function getDesafio($id)
	{
		$db = new DB();
		$sql = "SELECT * FROM " . TBL_DESAFIOS_PRE . " WHERE id = $id";
		$res = $db->queryUniqueObject($sql);
		if(!$res)
		{
			return 0;
		}
		return $res;
	}

}

?>