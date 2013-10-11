<?php
/**
 * @Package: ELFIC FRAMEWORK
 * @subpackage MyGame
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com>
 * @Date: Octubre, 2010
 * @File: index2.php
 * @Version: 1.0
 */
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_Choose.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_Answer.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_Match.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_FillIn.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_FromText.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_Organize.php');
include_once (APP_PATH.DS.'lib'.DS.'desafios'.DS.'Desafio_Media.php');

class ComDesafios extends Elfic {
	
	/* Tipo de desafio */
	private $_tipo = null;
	
	/**
	 * Retorna el id de un desafio y su tipo a partir de una consulta aleatoria
	 * @param int $desafioId
	 * @param int $subnivelId
	 */
	/*public function getDesafioRand($desafioId, $subnivelId)
	{
		$tipo = $this->_getTipoDesafio($desafioId);
		
		$this->_tipo = $tipo;
		
		$db = new DB();
		$sql = "SELECT id, desafios_tipos, respuestas_id FROM " . TBL_DESAFIOS_PRE
		     . " WHERE subniveles_id = '$subnivelId' "
		     . "AND desafios_tipos = '$tipo' ORDER BY RAND()";
		
		$res = $db->queryUniqueObject($sql);
		if(!$res)
		{
			$msg = "Error";
		}	
		$desafio = $this->_getDesafio($res->id, $res->desafios_tipos);
		$respuestas = $this->_getRespuestas($res->id);
		$correcta = $this->_getRespuestaCorrecta($res->respuestas_id);
		$this->_setInterfazToFlash($desafio, $respuestas, $correcta);
	} */
	
	public function getDesafioRand($desafioId, $subnivelId)
	{
		global $uid;
		
		$tipo = $this->_getTipoDesafio($desafioId);
	
		$this->_tipo = $tipo;
		
		$ingreso = Usuarios::getUltimoIngreso($uid);
	
		$db = new DB();
		$sql = "SELECT id, desafios_tipos, respuestas_id FROM " . TBL_DESAFIOS_PRE
			. " WHERE subniveles_id = '$subnivelId' "
			. "AND desafios_tipos = '$tipo' AND id NOT IN (SELECT preguntas_id FROM "
			. "estudiantes_desafios WHERE fecha >= $ingreso ) ORDER BY RAND()";
		$res = $db->queryUniqueObject($sql);
		if(!$res)
		{
			$sql = "SELECT id, desafios_tipos, respuestas_id FROM " . TBL_DESAFIOS_PRE
				. " WHERE subniveles_id = '$subnivelId' "
				. "AND desafios_tipos = '$tipo' ORDER BY RAND()";
			$res = $db->queryUniqueObject($sql);
		}
		$desafio = $this->_getDesafio($res->id, $res->desafios_tipos);
		$respuestas = $this->_getRespuestas($res->id);
		$correcta = $this->_getRespuestaCorrecta($res->respuestas_id);
		$this->_setInterfazToFlash($desafio, $respuestas, $correcta);
	}
	
	/**
	 * Impresión de variables que tomará la interfaz flash
	 * @param int $id
	 * @param int $tipo
	 */
	private function _getDesafio($id, $tipo)
	{
		switch($tipo)
		{
			case '1':
				$d = new Desafio_Choose();
				$desafio = $d->get($id, $tipo);
			break;
			case '2':
				$d = new Desafio_Answer();
				$desafio = $d->get($id, $tipo);
			break;
			case '3':
				$d = new Desafio_Match();
				$desafio = $d->get($id, $tipo);
			break;
			case '4':
				$d = new Desafio_FillIn();
				$desafio = $d->get($id, $tipo);
				break;
			case '5':
				$d = new Desafio_Media();
				$desafio = $d->get($id, $tipo);
				break;
			case '6':
				$d = new Desafio_Media();
				$desafio = $d->get($id, $tipo);
			break;
			case '7':
				$d = new Desafio_Organize();
				$desafio = $d->get($id, $tipo);
				break;
			default:
				echo "Debe suministrar un tipo de desafio";
		}
		
		return $desafio;
	}
	
	/**
	 * Retorna el id del tipo de desafio a partir del id del desafio
	 * @param int $desafioId
	 */
	private function _getTipoDesafio($desafioId)
	{
		$db = new DB();
		$sql = "SELECT desafios_tipos_id FROM " . TBL_DESAFIOS . " WHERE id = '$desafioId'";
		return $db->queryUniqueValue($sql);
	}
	
	/**
	 * Retorna el id de la respuesta correcta a un desafio
	 * @param int $id
	 */
	public function _getRespuestaCorrecta($id)
	{
		$db = new DB();
		$sql = "SELECT id, respuesta FROM " . TBL_RESPUESTAS . " WHERE id = $id";
		$res = $db->queryUniqueObject($sql);
		if(!$res)
		{
			return 0;
		}
		return $res;
	}
	
	/**
	 * Retorna arreglo de respuestas
	 * @param int $preguntasId
	 */
	private function _getRespuestas($preguntasId)
	{
		$db = new DB();
		$sql = "SELECT r.id, r.respuesta  FROM " . TBL_RESPUESTAS 
		     . " r INNER JOIN ". TBL_DESAFIOS_PRE
		     . " p ON r.preguntas_id = p.id WHERE r.id != p.respuestas_id "
		     . " AND preguntas_id = $preguntasId "
		     . "ORDER BY RAND() LIMIT 3";
		$res = $db->query($sql);
		if(!$res)
		{
			return 0;
		}
		$data = array();
		$i = 0;
		while ($line = $db->fetchNextObject($res))
		{
			$data[$i]['id'] = $line->id;
			$data[$i]['respuesta'] = $line->respuesta;
			$i++;
		}
		return $data;
	}
	/**
	 * imprime variables para pasar a la interfaz flash
	 * @param object $pregunta 
	 * @param object $respuestas 3 respuestas erroneas
	 * @param object $correcta respuesta correcta
	 * @return void
	 */
	private function _setInterfazToFlash($pregunta, $respuestas, $correcta)
	{
		global $subnivelN, $nivelN, $desafioN, $intentos;
		
		$preguntaId = $pregunta->id;
		$m = $pregunta->medio;
		$preguntaR = $pregunta->descripcion;
		$pregunta = $pregunta->pregunta;
		
		$respuestaId1 = $correcta->id;
		$respuesta1 = $correcta->respuesta;
		
		$respuestaId2 = $respuestas[0]['id'];
		$respuesta2 = $respuestas[0]['respuesta'];
		$respuestaId3 = $respuestas[1]['id'];
		$respuesta3 = $respuestas[1]['respuesta'];
		$respuestaId4 = $respuestas[2]['id'];
		$respuesta4 = $respuestas[2]['respuesta'];
		
		$url = "preguntaId=".$preguntaId
		 . "&pregunta=".$pregunta
		 . "&preguntaR=".$preguntaR
		 . "&respuestaId1=".$respuestaId1
		 . "&respuesta1=".$respuesta1
		 . "&respuestaId2=".$respuestaId2
		 . "&respuesta2=".$respuesta2
		 . "&respuestaId3=".$respuestaId3
		 . "&respuesta3=".$respuesta3
		 . "&respuestaId4=".$respuestaId4
		 . "&respuesta4=".$respuesta4
		 . "&subnivelId=".$subnivelN
		 . "&nivelId=".$nivelN
		 . "&desafioId=".$desafioN
		 . "&intentos=".$intentos
		 . "&medio=".$m
		 . "&desafioTipo=".$this->_tipo;
		echo $url;
	}
	
	private function _setInterfazToFlashNull()
	{
		$url = "preguntaId=0"
		. "&pregunta=0"
		. "&respuestaId1=0"
		. "&respuesta1=0"
		. "&respuestaId2=0"
		. "&respuesta2=0"
		. "&respuestaId3=0"
		. "&respuesta3=0"
		. "&respuestaId4=0"
		. "&respuesta4=0"
		. "&subnivelId=0"
		. "&nivelId=0"
		. "&desafioId=0"
		. "&desafioTipo=0";
		echo $url;
	}
	
	public function setDesafioRespuesta()
	{
		global $uid, $subnivelN, $nivelN, $desafioN, $intentos;
		
		/*$subnivelN = 1;
		$desafioN = 48;*/
		
		$_pid = isset($_POST['preguntaId']) ? $_POST['preguntaId'] : null;
		$_rid = isset($_POST['respuestaId']) ? $_POST['respuestaId'] : null;
		
		$e = 0;
		if($this->_siRespuestaCorrecta($_pid, $_rid)) $e = 1;
		
		$data = array();
		$data['estudiantes_id'] = $uid;
		$data['preguntas_id'] = $_pid;
		$data['respuestas_id'] = $_rid;
		$data['estado_desafio'] = $e;
		$data['fecha'] = Elfic::now();
		$data['subniveles_id'] = $subnivelN;
		$data['desafios_id'] = $desafioN;
		$db = new DB();
		if(!$e && $intentos < 2)
		{
			$db->perform(TBL_DESAFIOS_EST, $data);
			$_SESSION['intentos']++;
			Elfic::cosRedirect('index2.php?_do=get');
		} 
		else
		{
			$_SESSION['intentos'] = 0;
			
			$_SESSION['desafioN'] = $desafioN+1;
			
			if($desafioN % TOT_DES_SUBNIVEL == 0)
			{
				if($this->_siSuperoSubnivel($subnivelN) == 1)
				{
					$_SESSION['subnivelN'] = $subnivelN+1;
					if ($desafioN == TOT_SUBN_NIVEL)
					{
						$_SESSION['nivelN'] = $nivelN+1;
					}
					
					$db->perform(TBL_DESAFIOS_EST, $data);
					
					// Si es el desafio final 
					if($desafioN == TOT_SUBN_NIVEL * TOT_NIVELES )
					{
						$this->_setInterfazToFlashFinal();
					}
					else
					{
						Elfic::cosRedirect('index2.php?_do=get');
					}
				}
				else 
				{
					$db->perform(TBL_DESAFIOS_EST, $data);
					//$_SESSION['desafioN'] = 0;
					//$_SESSION['subnivelN'] = 0;
					//$_SESSION['nivelN'] = 0;
					$_SESSION['intentos'] = 0;
					$this->_setInterfazToFlashNull();
				}
			}
			else 
			{
				$db->perform(TBL_DESAFIOS_EST, $data);
				Elfic::cosRedirect('index2.php?_do=get');
			} 
		}
		
	}
	
	
	/**
	 * 
	 * verdadero si espuesta que envio el usuario es la corresponde a la pregunta
	 * @param int $preguntaId
	 * @param int $respuestaId
	 */
	private function _siRespuestaCorrecta($preguntaId, $respuestaId)
	{
		$db = new DB();
		$sql = "SELECT respuestas_id FROM " . TBL_DESAFIOS_PRE
		     . " WHERE id = $preguntaId";
		$res = $db->queryUniqueValue($sql);
		if($res == $respuestaId)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	private function _siSuperoSubnivel($subnivel)
	{
		global $uid;
		
		$desafio = 1;
		
		if($subnivel > 1) $desafio = (($subnivel - 1) * 48) + 1;
		
		/* id de registro de inicio del más reciente subnivel */
		
		$db = new DB();
		$sql = "SELECT MAX(id) FROM estudiantes_desafios "
		     . "WHERE estudiantes_id = $uid AND desafios_id = $desafio";
		$idIniUltimo = $db->queryUniqueValue($sql);
		
		if(!$idIniUltimo) $idIniUltimo = 0;
		
		$where = "estado_desafio = 1 AND subniveles_id = '$subnivel' "
		       . "AND estudiantes_id = $uid AND id >= $idIniUltimo";
		$db = new DB();
		$res = $db->countOf(TBL_DESAFIOS_EST, $where);
		
		if($res > 28)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	/**
	 * Continua en desafio
	 * DEPRECACTED
	 */
	public function setContinueDesafio()
	{
		global $uid;
		
		$db = new DB();
		$sql = "SELECT desafios_id FROM " . TBL_DESAFIOS_EST 
		     . " WHERE estudiantes_id = $uid AND estado_desafio = 1 "
		     . "ORDER BY id DESC ";
		$res = $db->queryUniqueValue($sql);
		
		if($res > 1) $_SESSION['desafioN'] = $res + 1;
		else $_SESSION['desafioN'] = 1;
		
		Elfic::cosRedirect('index2.php?_do=get');
	}
	
	/**
	 * Continua en subnivel
	 */
	public function setContinue()
	{
		global $uid;
	
		$db = new DB();
		$sql = "SELECT subniveles_id FROM " . TBL_DESAFIOS_EST
		. " WHERE estudiantes_id = $uid AND estado_desafio = 1 "
		. "ORDER BY id DESC ";
		$res = $db->queryUniqueValue($sql);
	
		if($res > 1){
			$_SESSION['desafioN'] = (($res - 1) * 48) + 1;
			$_SESSION['subnivelN'] = $res;
			if($res > 384) $_SESSION['nivelN'] = 2;
			else $_SESSION['nivelN'] = 1;
		}
		else 
		{
			$_SESSION['desafioN'] = 1;
			$_SESSION['subnivelN'] = 1;
			$_SESSION['nivelN'] = 1;
		}
	
		Elfic::cosRedirect('index2.php?_do=get');
	}
	
	/**
	 * Continua en subnivel
	 */
	public function start()
	{
		$_SESSION['desafioN'] = 1;
		$_SESSION['subnivelN'] = 1;
		$_SESSION['nivelN'] = 1;
	
		Elfic::cosRedirect('index2.php?_do=get');
	}
	

}

?>