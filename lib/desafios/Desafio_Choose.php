<?php

class Desafio_Choose extends Desafio {
	
	const TIPO = 1;
	
	private $_id = null;
	
	
	
	/**
	 * @desc Consulta aleatoria para obtener un desafio de los disponibles
	 * para un subnivel 
	 * @param int $subnivelId
	 * @return object
	 */
	public function get($id)
	{
		$d = parent::getDesafio($id);
		if(!$d) return false;
		else return $d;		
	}
	
}

?>