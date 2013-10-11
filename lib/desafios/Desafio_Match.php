<?php

class Desafio_Match extends Desafio {
	
	const TIPO = 1;
	
	private $_id = null;
	
	
	/**
	 * @desc Retona objeto con un desafio que ha sido consultado previamente de forma aleatoria
	 * @access private
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